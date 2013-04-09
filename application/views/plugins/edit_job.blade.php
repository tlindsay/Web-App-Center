<div class="modal hide" id="edit_job">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h3>Edit Project</h3>
	</div>
	<div class="modal-body">
		<form method="POST" action="{{ URL::to('job/upload') }}" id="upload_modal_form" enctype="multipart/form-data">
			<label for="dueDate">Due Date</label>
			<input type="text" name="dueDate" id="dueDate" value="{{ $jobs->datedue }}"/>
			<label for="jobName">Job Name</label>
			<input type="text" name="CompleteDate" id="CompleteDate" value="{{ $jobs->projname }}"/>
			<label for="requestedDate">Project Type</label>
			<input type="text" name="requestedDate" id="requestedDate" value="{{ $jobs->projtype }}"/>
			<label for="requestor">Requestor</label>
			<input type="text" name="requestor" id="requestor" value="{{ $jobs->reqname }}"/>
			<label for="status">Status</label>
			<input type="text" name="status" id="status" value="{{ $jobs->projstatus }}"/>
			<label for="email">Email</label>
			<input type="text" name="email" id="email" value="{{ $jobs->reqemail }}"/>
			<label for="description">Job Notes</label>
			<textarea placeholder="Describe your job request in a few sentences" name="description" id="description" class="span5">{{ $jobs->job_notes }}</textarea>
	    </form>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Cancel</a>
    	<button type="button" onclick="$('#upload_modal_form').submit();" class="btn btn-primary">Update Job</a>
	</div>
</div>