<div id="employeeModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form id="formAddEmployee" enctype="application/x-www-form-urlencoded" method="POST" action="{{route('employeeSave')}}">
                <input name="id" type="text" id="inputId" class="hidden" value="">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add employee</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputFirstname" class="col-sm-3 form-control-label text-right">First name</label>
                        <div class="col-sm-9">
                            <input required name="firstname" type="text" class="form-control" id="inputFirstname" placeholder="First name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputLastname" class="col-sm-3 form-control-label text-right">Last name</label>
                        <div class="col-sm-9">
                            <input required name="lastname" type="text" class="form-control" id="inputLastname" placeholder="Last name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputBirthdate" class="col-sm-3 form-control-label text-right">Birth date</label>
                        <div class="col-sm-9">
                            <input required name="birthdate" type="text" class="form-control" id="inputBirthdate" placeholder="Birth date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="selectJob" class="col-sm-3 form-control-label text-right">Job title</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="job_id" id="selectJob">
                                @foreach($jobs as $job)
                                    <option value="{{$job['id']}}">{{$job['title']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="selectLocation" class="col-sm-3 form-control-label text-right">Location</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="location_id" id="selectLocation">
                                @foreach($locations as $location)
                                    <option value="{{$location['id']}}">{{$location['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputHired" class="col-sm-3 form-control-label text-right">Hired on</label>
                        <div class="col-sm-9">
                            <input required type="text" name="hired" class="form-control" id="inputHired" placeholder="Date when hired">
                        </div>
                    </div>
                    <div class="alert alert-danger hidden" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        Oops.. Error appeared. Please try again later
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>