document.addEventListener('DOMContentLoaded', function() {

  if (Func.$('#new_profile_picture')) {
    Func.$('#new_profile_picture').addEventListener('change', function() {
      Func.$('#profile_picture_form').submit();
    });
  }

});
