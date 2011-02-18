//– publisher class —
function Publisher() {
    this.subscribers = [];
};

Publisher.prototype.deliver = function(data) {

  this.subscribers.forEach(
		function(fn) { 
			fn(data); 
		}
	);
};

//– subscribe method to all existing objects
Function.prototype.subscribe = function(publisher) {
    var that = this;
    var alreadyExists = publisher.subscribers.some(function(el) {
        if (el === that) {
            return;
        }
    });

    if (!alreadyExists) {
        publisher.subscribers.push(this);
    }
    return this;
};




var JobController = {
	
	removeFavoriteJob: function(id) {
		JobModel.removeFavoriteJob(id);
	},
	
	favoriteJobRemoved: function(response) {
		JobView.rebuildJobsLists(response);
	},
	
	addFavoriteJob: function(id) {
		JobModel.addFavoriteJob(id);
	},
	
	favoriteJobAdded: function(response) {
		JobView.rebuildJobsLists(response);
	},
	
	init: function() {
		this.favoriteJobRemoved.subscribe(JobModel.favoriteJobRemovedEvent);
		this.favoriteJobAdded.subscribe(JobModel.favoriteJobAddedEvent);
	}
}

var JobModel = {
	
	favoriteJobRemovedEvent: new Publisher(),
	
	favoriteJobAddedEvent: new Publisher(),
	
	removeFavoriteJob: function(id) {
		$.post(
			"ajax/unfav_job",
			{job_id:id},
			this.removeFavoriteJobCallback
		)
	},
	
	removeFavoriteJobCallback: function(response) {
		JobModel.favoriteJobRemovedEvent.deliver(response)
	},
	
	addFavoriteJob: function(id) {
		$.post(
			"/ajax/fav_job",
			{job_id:id},
			this.addFavoriteJobCallback
		)
	},
	
	addFavoriteJobCallback: function(response) {
		JobModel.favoriteJobAddedEvent.deliver(response);
	}
	
	
}

var JobView = {
	
	rebuildJobsLists: function(response) {

		var _response = $.parseJSON(response);
		
		if (_response.action == 'fav_job') {
			$("#job_item_" + _response.job_id).remove();

			$("#no_fav_jobs").hide();

			if (parseInt(_response.result) == 1) {
				this.favoriteJobsList.prepend($(
					"<li class=\"white_region\" id=\"fav_job_item_" + _response.job_id + "\"> \
						<div class=\"inner\"> \
							<div class=\"left\"> \
								<a class=\"job_title\" href=\"/jobs/view/company:" + _response.company_slug + "/slug:" + _response.job_slug + "\">" + _response.job_title 
								+ "</a><p>at " + _response.company_name + " - <span class=\"stamp\">" + _response.posted_date +  "</span></p> \
							</div> \
							<div class=\"options\"> \
								<img rel=\"" + _response.job_id + "\" title=\"Remove this job\" class=\"remove_fav_job\" src=\"/img/Basic_set_PNG/delete_16.png\" /></div> \
						</div> \
					</li>"
				))
			}
		} else if (_response.action == 'unfav_job') {
			console.log('asdasdas');
			$("#fav_job_item_" + _response.job_id).remove();
		}
		
		
	},
	
	init: function() {
		this.jobsForInterest = $("#other_job_posts");
		this.favoriteJobsList = $("#fav_jobs_list");
		this.removeFavoriteJob = $("img.remove_fav_job");
		this.addFavoriteJob = $("img.fav_job");
		this.removeFavoriteJob.live('click', function() {
			JobController.removeFavoriteJob($(this).attr("rel"));
		});
		this.addFavoriteJob.live('click', function() {
			JobController.addFavoriteJob($(this).attr("rel"));
		})
	}
	
}

var ResumeView = {
	
	setUpOverlays: function() {
		$(".trigger_overlay").click(function(){
			$("#" + $(this).attr("rel")).show($(this).attr("effect"), {}, 100, function(){});
			backgroundOverlay.show();
		})

		$(".close_overlay").click(function(){

			$(this).parent().fadeOut(function(){
				backgroundOverlay.fadeOut();
			})

		})
	},
	
	// alert_copy: $("#ResumeSettingAlertCopy"),
	// 	email_notification: $("#ResumeSettingEmailNotification"),
	// 	show_last_updated: $("#ResumeSettingShowLastUpdated"),
	// 	allow_direct_contact: $("#ResumeSettingAllowDirectContact"),
	
	getResumeSettings: function() {
		return {
			resume_id: ResumeView.resumeId,
			status:(ResumeView.status.is(":checked") ? 'active' : 'disabled'), 
			hide_personal_info:(ResumeView.hide_personal_info.is(":checked") ? 1 : 0),
			alert_copy:(ResumeView.alert_copy.is(":checked") ? 1 : 0),
			email_notification:(ResumeView.email_notification.is(":checked") ? 1 : 0),
			show_last_updated:(ResumeView.show_last_updated.is(":checked") ? 1 : 0),
			allow_direct_contact:(ResumeView.allow_direct_contact.is(":checked") ? 1 : 0)
		}
	},
	
	blinkUpdatedStatus: function() {
		this.updatedStatus.fadeIn(1000);
		setTimeout(function(){ResumeView.updatedStatus.fadeOut(500)}, 2000);
	},
	
	triggerUpdateSectionName: function(section) {
		section.toggleClass("section_name_editor");
		section.siblings("input[type=button]").toggle();
	},
	
	init: function() {
		this.resumeId = $("#ResumeId").val();
		this.status = $("#ResumeSettingStatusActive");
		this.hide_personal_info = $("#ResumeSettingHidePersonalInfo"),
		this.alert_copy = $("#ResumeSettingAlertCopy"),
		this.email_notification = $("#ResumeSettingEmailNotification"),
		this.show_last_updated = $("#ResumeSettingShowLastUpdated"),
		this.allow_direct_contact = $("#ResumeSettingAllowDirectContact"),
		this.updateResumeSettings = $("#update_resume_settings");
		this.updatedStatus = $("#updated_status");
		this.updateResumeSettings.click(function(){
			ResumeController.updateResumeSettings(ResumeView.getResumeSettings());
		})
		
		this.sectionNameEditor = $(".section_name_editor");
		this.sectionNameEditor.click(function(){
			ResumeView.triggerUpdateSectionName($(this))
		})
		
		this.updateSectionName = $(".update_section_name");
		this.updateSectionName.click(function(){
			ResumeController.updateSectionName($(this))
		})
		
		this.setUpOverlays();
	}
}

var ResumeModel = {
	
	resumeSettingsUpdatedEvent: new Publisher(),
	
	sectionNameUpdatedEvent: new Publisher(),
	
	updateResumeSettings: function(settings) {

		$.post(
			"/ajax/update_resume_settings",
			settings,
			this.updateResumeSettingsCallback
		)
	},
	
	updateResumeSettingsCallback: function() {
		ResumeModel.resumeSettingsUpdatedEvent.deliver();
	},
	
	updateSectionName: function(section) {
		var _section = section;
		var updatedName = _section.siblings("input[type=text]").val();
		if (updatedName != '') {
			$.post(
				"/ajax/update_section_name",
				{id:_section.siblings("input[type=hidden]").val(), resume_id:ResumeView.resumeId, section:_section.attr("rel"), name:updatedName},
				this.updateSectionNameCallback(_section)
			)
		}
		
	},
	
	updateSectionNameCallback: function(section) {
		ResumeModel.sectionNameUpdatedEvent.deliver(section);
	},
}

var ResumeController = {
	
	resumeSettingsUpdated: function() {
		ResumeView.blinkUpdatedStatus();
	},
	
	updateResumeSettings: function(settings) {
		ResumeModel.updateResumeSettings(settings);
	},
	
	updateSectionName: function(section) {
		ResumeModel.updateSectionName(section);
	},
	
	sectionNameUpdated: function(section) {
		section.siblings("input[type=text]").trigger("click");
		ResumeView.blinkUpdatedStatus();
	},
	
	init: function() {
		this.resumeSettingsUpdated.subscribe(ResumeModel.resumeSettingsUpdatedEvent);
		this.sectionNameUpdated.subscribe(ResumeModel.sectionNameUpdatedEvent);
	}
}

$(function(){
	window.backgroundOverlay = $("#overlay");
	JobController.init();
	JobView.init();
	ResumeController.init();
	ResumeView.init();
})