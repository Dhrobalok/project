// setup with basic table
function removeTag(tag){
  if ($(tag).length) {
      $(tag).remove();
  }
}

function loadBasicModal(response){
  if(response.modal == 'modal-lg'){
      modal = $('#ajax-basic-modal-lg');
    }else if(response.modal == 'modal-sm'){
      modal = $('#ajax-basic-modal-sm');
    }else if(response.modal == 'modal-xl'){
      modal = $('#ajax-basic-modal-xl');
    }else{
      modal = $('#ajax-basic-modal');
    }
    return modal;
}

$(document).ready(function() {
modal =$('#ajax-basic-modal');
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('click','.add_item',function (e) {
  event.preventDefault();

  url = $(this).attr('href');
  data_label = $(this).attr('data-label');
  if(data_label == undefined) data_label = '';
  $.ajax({
      type: "GET",
      url: url,
      beforeSend: function() {
        $.LoadingOverlay("show");
      },
      success: function (response) {
        $.LoadingOverlay("hide");
        modal = loadBasicModal(response);
        modal.modal('show');
        modal.find('.modal-body').html(response.html);
        ajaxForm = modal.find(`[data-form='ajaxForm']`);
        modal.find(`[data-button='save']`).attr('data-value', 'create');
        modal.find(`[data-button='save']`).val("Add New");
        ajaxForm.trigger("reset");
        modal.find('.modal-title').html("Add New "+data_label);
        load_modal_particles();

        actionType = modal.find(`[data-button='save']`).attr('data-value');
        if(actionType =='create'){
          $input = $('<input type="hidden" name="action_type"/>').val('create');
          ajaxForm.append($input);
        }
      },

      error: function (error) {
        $.LoadingOverlay("hide");
        trigger_ajax_swal_msg(error);
      }
  });
});

$(document).on('submit',modal.find(`[data-form='ajaxForm']`), function(e){
    if(modal.find(`[data-form='ajaxForm']`).length > 0){
      e.preventDefault();
      ajaxForm = modal.find(`[data-form='ajaxForm']`);

      actionType = modal.find(`[data-button='save']`).attr('data-value');
      var url = ajaxForm.attr('action');
      if(url != undefined){
        var formData = new FormData(ajaxForm.get(0));
        $.ajax({
            data: formData,
            url: url,
            type: "POST",
            processData: false,
            contentType: false,
            beforeSend: function() {
              modal.find(`[data-button='save']`).val('Sending..').attr('disabled', 'disabled');
            },
            dataType: 'json',
            success: function (response , textStatus, xhr) {
              var tableid = response.table;
              var table = $('#'+tableid+'');

              if(xhr.status === 200){

                if (actionType == "update") {
                    table.find(`[data-row-id='${response.id}']`).replaceWith(response.html);
                }else{
                  if(response.insert == 'append'){
                    table.find('tbody').append(response.html);
                  }else{
                    table.find('tbody').prepend(response.html);
                  }
                }

                table.find(`[data-row-id='${response.id}']`).addClass('update_row');

                modal.modal('hide');
                if(response.modal !=''){
                  modal = loadBasicModal(response);
                }
                trigger_ajax_swal_msg(xhr);

                focus_row();
              }
            },
            error: function (xhr, status, error) {
              $.LoadingOverlay("hide");
              if(actionType != 'update'){
                var btn_val = 'Add New';
              }else{
                var btn_val = 'Save Changes';
              }

              modal.find(`[data-button='save']`).val(btn_val).prop("disabled", false);
              var errors = [];
              var errorKeys = [];
              if(xhr.status === 422 ) {
                $.each(xhr.responseJSON.errors, function (key, error)
                  {
                    errors[key] = error[0];
                    errorKeys.push(key);
                  });
                   ajaxForm.find('input,select').each(function(i, v) {
                      var tag = $(this);
                      var keyName = tag.attr('name');
                      fkey = keyName;
                      if (keyName !== undefined) {
                        if ( keyName.indexOf('[]') > -1 ) {
                           fkey = keyName.replace('[]','');
                        }
                      }

                      if ($.inArray(fkey, errorKeys) == -1)
                      {
                        tag.siblings('.invalid-feedback').text('')
                      }else{
                        tag.siblings('.invalid-feedback').text(errors[fkey]);
                      }
                    });
              }else{
                trigger_ajax_swal_msg(xhr);
              }

              }
        });
      }
    }

});

$(document).on('click','.show_item',function (e) {
    event.preventDefault();
    url = $(this).attr('href');
    data_label = $(this).attr('data-label');
    if(data_label == undefined) data_label = '';
    $.ajax({
        type: "GET",
        url: url,
        beforeSend: function() {
          $.LoadingOverlay("show");
        },
        success: function (response) {
          $.LoadingOverlay("hide");
          modal = loadBasicModal(response);
          modal.find('.modal-body').html(response.html);
          modal.find('.modal-title').html(data_label+" Details");
          modal.modal('show');
          load_modal_particles();
        },

        error: function (error) {
          $.LoadingOverlay("hide");
          trigger_ajax_swal_msg(error);
        }
    });
  });

$(document).on('click','.duplicate_item', function (e){
  e.preventDefault();
  data_id = $(this).data('id');
  url = $(this).attr('href');
  data_label = $(this).attr('data-label');
  if(data_label == undefined) data_label = '';

  $.ajax({
      type: "GET",
      url: url,
      beforeSend: function() {
        $.LoadingOverlay("show");
      },
      success: function (response) {
        $.LoadingOverlay("hide");
        modal = loadBasicModal(response);
        modal.modal('show');
        modal.find('.modal-body').html(response.html);
        ajaxForm = modal.find(`[data-form='ajaxForm']`);
        modal.find(`[data-button='save']`).attr('data-value', 'duplicate');
        modal.find(`[data-button='save']`).val("Add New");
        modal.find('.modal-title').html("Duplicate "+ data_label);
        modal.find("input[name=id]").val('');
        load_modal_particles();

        actionType = modal.find(`[data-button='save']`).attr('data-value');
        if(actionType =='duplicate'){
          $action_type = $('<input type="hidden" name="action_type"/>').val('duplicate');
          $hidden_id = $('<input type="hidden" name="id"/>').val(data_id);
          ajaxForm.append($action_type);
          ajaxForm.append($hidden_id);
        }
      },
      error: function (error) {
        $.LoadingOverlay("hide");
        trigger_ajax_swal_msg(error);
      }
  });
});

$(document).on('click','.edit_item', function (e){
  e.preventDefault();
  data_id = $(this).data('id');
  url = $(this).attr('href');
  data_label = $(this).attr('data-label');
  if(data_label == undefined) data_label = '';

  $.ajax({
      type: "GET",
      url: url,
      beforeSend: function() {
        $.LoadingOverlay("show");
      },
      success: function (response) {
        $.LoadingOverlay("hide");
        modal = loadBasicModal(response);
        modal.modal('show');
        modal.find('.modal-body').html(response.html);
        ajaxForm = modal.find(`[data-form='ajaxForm']`);
        modal.find(`[data-button='save']`).attr('data-value', 'update');
        modal.find(`[data-button='save']`).val("Save Changes");
        modal.find('.modal-title').html("Update "+data_label);
        load_modal_particles();

        actionType = modal.find(`[data-button='save']`).attr('data-value');
        if(actionType =='update'){
          $action_type = $('<input type="hidden" name="action_type"/>').val('update');
          $hidden_id = $('<input type="hidden" name="id"/>').val(data_id);
          ajaxForm.append($action_type);
          ajaxForm.append($hidden_id);
        }
      },
      error: function (error) {
        $.LoadingOverlay("hide");
        trigger_ajax_swal_msg(error);
      }
  });
});

$(document).on('click','.delete_item', function (e){
  e.preventDefault();
  url = $(this).attr('href');

    Swal.fire({
      title:'Are you sure?',
      html:'You want to delete Record ?',
      showCancelButton:true,
      showCloseButton:true,
      confirmButtonText:'Yes, Delete',
      cancelButtonText:'Cancel',
      confirmButtonColor:'#556ee6',
      cancelButtonColor:'#d33',
      width:300,
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
            type: "DELETE",
            url: url,
            success: function (response , textStatus, xhr) {
              var table = eval(response.table);
              var tableid = response.table;
              var tr = $('#'+tableid+'').find(`[data-row-id='${response.id}']`);
              removeTag(tr);
              trigger_ajax_swal_msg(xhr);
            },
            error: function (error) {
                $.LoadingOverlay("hide");
                trigger_ajax_swal_msg(error);
            }
        });
      }
    })
});
});


// setup with datatable

$(document).ready(function() {

modal =$('#ajax-modal');

$(document).on('click','.add_new',function (e) {
event.preventDefault();
data_label = $(this).attr('data-label');
if(data_label == undefined) data_label = '';
url = $(this).attr('href');
$.ajax({
    type: "GET",
    url: url,
    beforeSend: function() {
      $.LoadingOverlay("show");
    },
    success: function (response , textStatus, xhr) {
      $.LoadingOverlay("hide");
      modal = loadAjaxModal(response);
      modal.modal('show');
      modal.find('.modal-body').html(response.html);
      postForm = modal.find(`[data-form='postForm']`);
      modal.find(`[data-button='save']`).attr('data-value', 'create');
      modal.find(`[data-button='save']`).val("Add New");
      postForm.trigger("reset");
      modal.find('.modal-title').html("Add New "+data_label);
      load_modal_particles();

      actionType = modal.find(`[data-button='save']`).attr('data-value');
      if(actionType =='create'){
        $input = $('<input type="hidden" name="action_type"/>').val('create');
        postForm.append($input);
      }
    },

    error: function (error) {
      $.LoadingOverlay("hide");
      trigger_ajax_swal_msg(error);
    }
});
});

$(document).on('submit',modal.find(`[data-form='postForm']`), function(e){
  if(modal.find(`[data-form='postForm']`).length > 0){
    e.preventDefault();
    postForm = modal.find(`[data-form='postForm']`);

    actionType = modal.find(`[data-button='save']`).attr('data-value');
    var url = postForm.attr('action');

    if(url != undefined){
      var formData = new FormData(postForm.get(0));
      $.ajax({
          data: formData,
          url: url,
          type: "POST",
          processData: false,
          contentType: false,
          beforeSend: function() {
            modal.find(`[data-button='save']`).val('Sending..').attr('disabled', 'disabled');
            postForm.find('.invalid-feedback').text('');
          },
          dataType: 'json',
          success: function (response , textStatus, xhr) {

            if(xhr.status === 200){

              var table = eval(response.table);
              var tableid = response.table;
              if (actionType != "update") {
                  table.draw();
                  table.on('draw', function () {
                    $('#'+tableid+'').find(`[data-row-id='${response.id}']`).addClass('update_row');
                  });

              }else{

                scrollPos = $('#'+tableid+'').parents('div.dataTables_scrollBody').scrollTop();
                table.ajax.reload(function() {
                    $('#'+tableid+'').parents('div.dataTables_scrollBody').scrollTop(scrollPos);
                    $('#'+tableid+'').find(`[data-row-id='${response.id}']`).addClass('update_row');
                },false);

              }

              modal.modal('hide');
              trigger_ajax_swal_msg(xhr);

              focus_row();
            }
          },
          error: function (xhr, status, error) {
            $.LoadingOverlay("hide");
            if(actionType != 'update'){
              var btn_val = 'Add New';
            }else{
              var btn_val = 'Save Changes';
            }

            modal.find(`[data-button='save']`).val(btn_val).prop("disabled", false);
            var errors = [];
            var errorKeys = [];
            if(xhr.status === 422 ) {
              $.each(xhr.responseJSON.errors, function (key, error)
                {
                  errors[key] = error[0];
                  errorKeys.push(key);
                });
                 postForm.find('input,select').each(function(i, v) {
                    var tag = $(this);
                    var keyName = tag.attr('name');
                    fkey = keyName;
                    if (keyName !== undefined) {
                      if ( keyName.indexOf('[]') > -1 ) {
                         fkey = keyName.replace('[]','');
                      }
                    }

                    if ($.inArray(fkey, errorKeys) == -1)
                    {
                      tag.siblings('.invalid-feedback').text('')
                    }else{
                      tag.siblings('.invalid-feedback').text(errors[fkey]);
                    }
                  });
            }else{
              trigger_ajax_swal_msg(xhr);
            }

            }
      });
    }
  }
});

$(document).on('click','.show_data',function (e) {
  event.preventDefault();
  url = $(this).attr('href');
  data_label = $(this).attr('data-label');
  if(data_label == undefined) data_label = '';
  $.ajax({
      type: "GET",
      url: url,
      beforeSend: function() {
        $.LoadingOverlay("show");
      },
      success: function (response , textStatus, xhr) {
        $.LoadingOverlay("hide");
        modal = loadAjaxModal(response);
        modal.find('.modal-body').html(response.html);
        modal.find('.modal-title').html(data_label+" Details");
        modal.modal('show');
        load_modal_particles();
      },

      error: function (error) {
        $.LoadingOverlay("hide");
        trigger_ajax_swal_msg(error);
      }
  });
});

$(document).on('click','.duplicate_data', function (e){
e.preventDefault();
data_id = $(this).data('id');
url = $(this).attr('href');
data_label = $(this).attr('data-label');
if(data_label == undefined) data_label = '';
$.ajax({
    type: "GET",
    url: url,
    beforeSend: function() {
      $.LoadingOverlay("show");
    },
    success: function (response , textStatus, xhr) {
      $.LoadingOverlay("hide");
      modal = loadAjaxModal(response);
      modal.modal('show');
      modal.find('.modal-body').html(response.html);
      postForm = modal.find(`[data-form='postForm']`);
      modal.find(`[data-button='save']`).attr('data-value', 'duplicate');
      modal.find(`[data-button='save']`).val("Add New");
      modal.find('.modal-title').html("Duplicate "+ data_label);
      modal.find("input[name=id]").val('');
      load_modal_particles();

      actionType = modal.find(`[data-button='save']`).attr('data-value');
      if(actionType =='duplicate'){
        $action_type = $('<input type="hidden" name="action_type"/>').val('duplicate');
        $hidden_id = $('<input type="hidden" name="id"/>').val(data_id);
        postForm.append($action_type);
        postForm.append($hidden_id);
      }
    },
    error: function (error) {
      $.LoadingOverlay("hide");
      trigger_ajax_swal_msg(error);
    }
});
});

$(document).on('click','.edit_data', function (e){
e.preventDefault();
data_id = $(this).data('id');
url = $(this).attr('href');
data_label = $(this).attr('data-label');
if(data_label == undefined) data_label = '';

$.ajax({
    type: "GET",
    url: url,
    beforeSend: function() {
      $.LoadingOverlay("show");
    },
    success: function (response , textStatus, xhr) {
      $.LoadingOverlay("hide");
      modal = loadAjaxModal(response);
      modal.modal('show');
      modal.find('.modal-body').html(response.html);
      postForm = modal.find(`[data-form='postForm']`);
      modal.find(`[data-button='save']`).attr('data-value', 'update');
      modal.find(`[data-button='save']`).val("Save Changes");
      modal.find('.modal-title').html("Update "+data_label);
      load_modal_particles();

      actionType = modal.find(`[data-button='save']`).attr('data-value');
      if(actionType =='update'){
        $action_type = $('<input type="hidden" name="action_type"/>').val('update');
        $hidden_id = $('<input type="hidden" name="id"/>').val(data_id);
        postForm.append($action_type);
        postForm.append($hidden_id);
      }
    },
    error: function (error) {
      $.LoadingOverlay("hide");
      trigger_ajax_swal_msg(error);
    }
});
});

$(document).on('click','.delete_data', function (e){
e.preventDefault();
url = $(this).attr('href');

Swal.fire({
    title:'Are you sure?',
    html:'You want to delete Record ?',
    showCancelButton:true,
    showCloseButton:true,
    confirmButtonText:'Yes, Delete',
    cancelButtonText:'Cancel',
    confirmButtonColor:'#556ee6',
    cancelButtonColor:'#d33',
    width:300,
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
          type: "DELETE",
          url: url,
          success: function (response , textStatus, xhr) {
            var table = eval(response.table);
            var tableid = response.table;
            var tr = $('#'+tableid+'').find(`[data-row-id='${response.id}']`);
            var row = table.row( tr );

            if ( row.child.isShown() ) {
                // This row is already open - remove it
                row.child( false ).remove();
            }

            tr.remove();
            trigger_ajax_swal_msg(xhr);
          },
          error: function (error) {
              $.LoadingOverlay("hide");
              trigger_ajax_swal_msg(error);
          }
      });
    }
  })
});

if(typeof(table) != "undefined" && table !== null) {
  table.on('draw', function(){
        $('input[name="item_checkbox"]').each(function(){this.checked = false;});
        $('input[name="main_checkbox"]').prop('checked', false);
        $('button#deleteAllBtn').addClass('d-none');
    });
}

});
