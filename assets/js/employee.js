
$(function () {

  loaddatatable();
});

function loaddatatable() {
  $('#example1 tfoot th').each(function () {
    var title = $(this).text();
    $(this).html('<input type="text" placeholder="Search ' + title + '" />');
  });

  $('#example1').dataTable({
    "processing": true,
    "serverSide": true,
    "order": [[3, "desc"]],
    "fnRowCallback": function (nRow, aData, iDisplayIndex) {
      var oSettings = this.fnSettings();
      $("td:first", nRow).html(oSettings._iDisplayStart + iDisplayIndex + 1);
      return nRow;
    },
    "ajax": cndDir1 + "/Employee/loaddatatable",
    dom: 'Bfrtip',
    buttons: [
      {
        text: 'Import CSV',
        action: function () {
          $('#mycsvform')[0].reset();
          $('#ImportModal').modal('show');

        }
      }, {
        text: "Create",
        action: function () {
          resetForm();
          $('#EmpModal').modal('show');
        }
      }
    ],
    initComplete: function () {
      // Apply the search
      this.api().columns().every(function () {
        var that = this;

        $('input', this.footer()).on('keyup change clear', function () {
          if (that.search() !== this.value) {
            that
              .search(this.value)
              .draw();
          }
        });
      });
    },
    responsive: true,
    columnDefs: [
      { responsivePriority: 1, targets: 0 },
      { responsivePriority: 10001, targets: 4 },
      { responsivePriority: 2, targets: -2 }
    ]
  });


}
function resetForm() {
  $('.modal-title').html("Add New Employee Details");
  $('#addEmp').show();
  $('#editEmp').hide();
  $(".file-div").show();
  $('#myform')[0].reset();
  $('.reset-image').hide();
  $('.reset-div').hide();
}
function deleteEmp(id) {

  if (confirm('Are you sure you want to delete this record?')) {
    $.post({
      type: "POST",
      data: { 'id': id },
      async: false,
      dataType: 'json',
      url: cndDir1 + "/Employee/deleteEmp",
      success: function (response) {
        console.log(response);
        if (response['success']) {
          toastr.success(response['msg'], 'Success');
          $("#example1").dataTable().fnDestroy();
          loaddatatable();
        }
        else
          toastr.error(response['msg'], 'Error!');
      },
      error: function (response) {
        toastr.error(response, 'Error!');
      }
    });

  }
}

function addEmp() {
  var form = $("#myform");
  form.validate();
  if ($("#myform").valid()) {
    var image = $('#image')[0].files;
    $.ajax({
      type: "POST",
      data: new FormData($("#myform")[0]),//only input
      url: cndDir1 + "/Employee/addEmp",
      dataType: 'json',
      contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
      processData: false, // NEEDED, DON'T OMIT THIS
      success: function (response) {
        if (response['success']) {
          $('#EmpModal').modal('hide');
          toastr.success(response['msg'], 'Success');
          $("#example1").dataTable().fnDestroy();
          loaddatatable();
          $('#myform')[0].reset();
        }
        else
          toastr.error(response['msg'], 'Error!');
      },
      error: function (response) {
        toastr.error(response, 'Error!');
      }
    });
  }
}


$("form[name='myform']").validate({
  // Specify validation rules
  rules: {
    // The key name on the left side is the name attribute
    // of an input field. Validation rules are defined
    // on the right side
    first_name: "required",
    last_name: "required",
    email: {
      required: true,
      // Specify that email should be validated
      // by the built-in "email" rule
      email: true
    },
    "hobbies[]": {
      required: true,
      minlength: 1
    },
    gender: "required",
    joining_date: "required",
    department: "required",
    image: "required"

  },
  // Specify validation error messages
  messages: {
    first_name: "Please enter your First Name",
    last_name: "Please enter your Last Name",
    email: "Please enter a valid email address",
    hobbies: "Please select your hobbies",
    gender: "Please select your gender",
    joining_date: "Please select your joining date",
    department: "Please select your department",
    image: "Please upload image"

  },
  errorPlacement: function (error, element) {
    if (element.is(":radio")) {
      error.insertAfter(".radiocls");
    }
    else if (element.is(":checkbox")) {
      error.insertAfter(".chkcls");
    }
    else {
      // This is the default behavior of the script for all fields
      error.insertAfter(element);
    }
  }
  // Make sure the form is submitted to the destination defined
  // in the "action" attribute of the form when valid
  /*submitHandler: function(form) {
    form.submit();
  }*/
});

function viewimage(url) {
  // imagepath = imagepath.replace('file:///','');
  $("#empimage").attr("src", url);
  $('#ImageModal').modal('show');

}

function edit(id) {

  $.ajax({
    type: "POST",
    data: { 'id': id },
    async: false,
    dataType: 'json',
    url: cndDir1 + "/Employee/fetchSingleEmp",
    success: function (response) {
      $('#myform')[0].reset();
      $("#hdn_id").val(response['id']);
      $("#first_name").val(response['first_name']);
      $("#last_name").val(response['last_name']);
      $("#email").val(response['email']);
      // $("#hobbies").val(response[''])
      $.each(response['hobbies'], function (index, value) {
        $("input[type=checkbox][value=" + value + "]").prop("checked", true);
      });
      $("input[type=radio][value=" + response['gender'] + "]").prop("checked", true);
      $("#joining_date").val(response['joining_date']);
      $("#department").val(response['department']);
      $("#image").attr("src", response['image_path']);

      $('#addEmp').hide();
      $('#editEmp').show();
      $('.reset-image').hide();
      $('.reset-div').show();
      $(".file-div").hide();
      $('.modal-title').html("Edit Employee Details");
      $('#EmpModal').modal('show');
    },
    error: function (response) {
      toastr.error(response, 'Error!');
    }
  });

}

function editEmp() {
  if (confirm('Are you sure you want to edit this record?')) {
    var form = $("#myform");
    form.validate();
    if ($("#myform").valid()) {
      //  var image = $('#image')[0].files;
      $.ajax({
        type: "POST",
        data: new FormData($("#myform")[0]),//only input
        url: cndDir1 + "/Employee/editEmp",
        dataType: 'json',
        contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
        processData: false, // NEEDED, DON'T OMIT THIS
        success: function (response) {
          if (response['success']) {
            $('#EmpModal').modal('hide');
            toastr.success(response['msg'], 'Success');
            $("#example1").dataTable().fnDestroy();
            loaddatatable();
            $('#myform')[0].reset();
          }
          else
            toastr.error(response['msg'], 'Error!');
        },
        error: function (response) {
          toastr.error(response, 'Error!');
        }
      });
    }
  }
}

function resetimage() {
  $(".reset-image").toggle();
}

//Import CSV CODE
function uploadcsv() {
  $.ajax({
    url: cndDir1 + "/Employee/ImportCSV",
    method: "POST",
    data: new FormData($('#mycsvform')[0]),
    contentType: false,          // The content type used when sending data to the server.  
    cache: false,                // To unable request pages to be cached  
    processData: false,          // To send DOMDocument or non processed data file it is set to false  
    dataType: 'json',
    success: function (response) {
     
      if (response['success']) {
        $("#ImportModal").modal('hide');
        $("#example1").dataTable().fnDestroy();
        loaddatatable();
      }
      else  {
        alert(response['msg']);
      }


    },
    error: function (data) {
      alert(data);
    }
  })
}
