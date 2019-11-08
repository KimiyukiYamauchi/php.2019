'use strict'
{
  $('.msg').fadeOut(3000)
  $('#my_file').on('change', function() {
    $('#my_form').submit()
  })
}
