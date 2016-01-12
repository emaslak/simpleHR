$(function () {
    var $employeeTableWrapper = $("#employeeTableWrapper");

    $('[data-toggle="tooltip"]').tooltip();

    $('.input-daterange').datepicker({
        format: 'yyyy-mm-dd'
    });

    $('#inputBirthdate').datepicker({
        format: 'yyyy-mm-dd',
        startView: 2,
        autoclose: true
    });

    $('#inputHired').datepicker({
        format: 'yyyy-mm-dd',
        startView: 1,
        autoclose: true
    });

    $('#addEmployee').on('click', function () {
        $('#formAddEmployee')[0].reset();
        $('#employeeModal').find('.alert').addClass('hidden');
    });

    $('.closeAlert').on("click", function () {
        $(this).closest('.alert').addClass('hidden');
    });

    $("#formAddEmployee").submit(function (e) {
        var url = $(this).attr('action');
        var $form = $(this);
        $.ajax({
            type: "POST",
            url: url,
            data: $form.serialize(),
            success: function (response) {
                if (200 == response.status) {
                    $('#employeeModal').modal('toggle');
                    updateEmployeeTable()
                } else {
                    $('#employeeModal').find('.alert').removeClass('hidden');
                }
            }
        });
        e.preventDefault();
    });

    $('#formAddVacation').submit(function(e) {
        var $form = $(this);
        var $vacationModal = $('#vacationModal');
        var url = $(this).attr('action');
        $.ajax({
            type: "POST",
            url: url,
            data: $form.serialize(),
            success: function (response) {
                if (200 == response.status) {
                    loadVacationTable($form.find('input[name=employee_id]').val());
                    updateEmployeeTable();
                } else if (403 == response.status) {
                    $vacationModal.find('.alert-message').html(
                        'Vacation date intervals seem to overlap or employee has no vacations left. Please check again'
                    );
                    $vacationModal.find('.alert').removeClass('hidden');
                } else {
                    $vacationModal.find('.alert-message').html('Oops.. Strange error happened, please try again later');
                    $vacationModal.find('.alert').removeClass('hidden');
                }
            }
        });
        e.preventDefault();
    });

    $employeeTableWrapper.on('click', '.employeeVacations', function () {
        var $row = $(this).closest('tr');
        var $vacationModal = $('#vacationModal');
        var $vacationForm = $('#formAddVacation');
        var id = $row.attr('id');
        var employeeFirstName = $row.find('.firstname').html();
        var employeeLastName = $row.find('.lastname').html();

        $vacationForm[0].reset();
        $('#vacationDatepicker').find('input').each(function() {
            $(this).datepicker("clearDates");
        });
        $vacationModal.find('.modal-title').html('View/add vacations for ' + employeeFirstName + ' ' + employeeLastName);
        $vacationForm.attr('action', 'vacation');
        $vacationForm.find('input[name=employee_id]').val(id);
        loadVacationTable(id);
        $vacationModal.modal('toggle');
    });

    $employeeTableWrapper.on('click', '.employeeDelete', function () {
        var id = $(this).closest('tr').attr('id');
        $.ajax({
            type: 'DELETE',
            url: 'employee/' + id,
            success: function (response) {
                if (200 == response.status) {
                    updateEmployeeTable();
                } else {
                    $employeeTableWrapper.find('.alert').removeClass('hidden');
                }
            }
        });
    });

    $employeeTableWrapper.on('click', '.employeeEdit', function () {
        var $form = $("#formAddEmployee");
        var $row = $(this).closest('tr');

        $form.find('#inputId').val($row.attr('id'));
        $form.find('#inputFirstname').val($row.find('.firstname').html());
        $form.find('#inputLastname').val($row.find('.lastname').html());
        $form.find('#inputBirthdate').val($row.find('.birthdate').html());
        $form.find('#selectJob').val($row.find('.job').data('id'));
        $form.find('#selectLocation').val($row.find('.location').data('id'));
        $form.find('#inputHired').val($row.find('.hired').html());

        $('#employeeModal').modal('toggle');
    });

    $('#vacationTableWrapper').on('click', '.vacationDelete', function () {
        var $vacationModal = $('#vacationModal');
        var id = $(this).closest('tr').data('id');

        $.ajax({
            type: 'DELETE',
            url: 'vacation/' + id,
            success: function (response) {
                if (200 == response.status) {
                    loadVacationTable($('#formAddVacation').find('input[name=employee_id]').val());
                    updateEmployeeTable();
                } else {
                    $vacationModal.find('.alert-message').html('Oops.. Strange error happened, please try again later');
                    $vacationModal.find('.alert').removeClass('hidden');
                }
            }
        });
    });

    function updateEmployeeTable() {
        $.get("employee/table", function (data) {
            $("#employeeTableWrapper").html(data);
        });
    }

    function loadVacationTable(id) {
        $.get("vacation/" + id +"/table", function (data) {
            $("#vacationTableWrapper").html(data);
        });
    }
});