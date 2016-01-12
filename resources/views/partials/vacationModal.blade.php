<div id="vacationModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <input name="id" type="text" id="inputId" class="hidden" value="">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form id="formAddVacation">
                    <input name="employee_id" type="text" class="hidden" value="">
                    <div class="input-daterange table clearfix" id="vacationDatepicker" >
                        <div class="input-group col-lg-5 col-mg-5 col-sm-5 col-xs-12 pull-left">
                            <input required type="text" class="form-control" name="start" placeholder="Vacation start" />
                        </div>
                        <div class="input-group col-lg-5 col-mg-5 col-sm-5 col-xs-12 pull-left">
                            <input required type="text" class="form-control" name="end"  placeholder="Vacation end" />
                        </div>
                        <div class="input-group col-lg-2 col-mg-2 col-sm-2 col-xs-12 pull-right">
                            <button class="form-control btn btn-default col-sm-2 col-lg-2" type="submit">Add</button>
                        </div>
                    </div>
                </form>
                <div id="vacationTableWrapper"></div>
                <div class="alert alert-danger hidden" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    <span class="alert-message">Oops.. Error appeared. Please try again later</span>
                    <button type="button" class="close closeAlert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>