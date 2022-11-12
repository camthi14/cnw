$(document).ready(function () {
  // HANDLE MODAL DELETE
  $(document).on('click', "#delete-category", function (e) {
    e.preventDefault();

    const form = $(this).closest('form');

    const nameTd = $(this).closest('tr').find('td:first');

    if (nameTd.length > 0) {
      $('.modal-body').html(
        `Bạn có muốn xóa <strong>"${nameTd.text()}"</strong>?`
      );
    }
    $('#modal-delete').modal({
      backdrop: 'static',
      keyboard: false
    })
      .one('click', '#delete-category-confirm', function () {
        form.trigger('submit');
      });
  });

  // DELETE
  $(document).on('submit', "#delete", function (e) {
    e.preventDefault();
    const action = this.action;

    $.ajax({
      type: 'post',
      url: action,
      dataType: 'json',
      data: new FormData(this),
      processData: false,
      contentType: false,
      beforeSend: function () {
      },
      success: function (response) {

        if (!response.error) {
          window.location.reload();
        }
      },
      error: function (e) {
        console.log("Oops! Something went wrong! ", e.responseText);

      },
    })
  })
})