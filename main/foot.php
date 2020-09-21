  <!-- CoreUI and necessary plugins-->
  <script src="node_modules/@coreui/coreui/dist/js/coreui.bundle.min.js"></script>
  <!--[if IE]><!-->
  <script src="node_modules/@coreui/icons/js/svgxuse.min.js"></script>
  <!--<![endif]-->
  <!-- Plugins and scripts required by this view-->
  <script src="node_modules/@coreui/chartjs/dist/js/coreui-chartjs.bundle.js"></script>
  <script src="node_modules/@coreui/utils/dist/coreui-utils.js"></script>
  <script src="js/main.js"></script>

  <script type="text/javascript" src="https://coreui.io/demo/3.1.0/vendors/jquery/js/jquery.slim.min.js" class="view-script"></script>
  <script type="text/javascript" src="https://coreui.io/demo/3.1.0/vendors/jquery-validation/js/jquery.validate.js" class="view-script"></script>
  <script type="text/javascript" src="https://coreui.io/demo/3.1.0/js/validation.js" class="view-script"></script>

  <script>
      $.validator.setDefaults({
          submitHandler: function submitHandler() {
              alert('submitted!');
          }
      });
      $('.valid-form').validate({
          rules: {
              firstname: 'required',
              lastname: 'required',
              username: {
                  required: true,
                  minlength: 2
              },
              password: {
                  required: true,
                  minlength: 5
              },
              confirm_password: {
                  required: true,
                  minlength: 5,
                  equalTo: '#password'
              },
              email: {
                  required: true,
                  email: true
              },
              agree: 'required'
          },
          messages: {
              firstname: 'Please enter your firstname',
              lastname: 'Please enter your lastname',
              username: {
                  required: 'Please enter a username',
                  minlength: 'Your username must consist of at least 2 characters'
              },
              password: {
                  required: 'Please provide a password',
                  minlength: 'Your password must be at least 5 characters long'
              },
              confirm_password: {
                  required: 'Please provide a password',
                  minlength: 'Your password must be at least 5 characters long',
                  equalTo: 'Please enter the same password as above'
              },
              email: 'Please enter a valid email address',
              agree: 'Please accept our policy'
          },
          errorElement: 'em',
          errorPlacement: function errorPlacement(error, element) {
              error.addClass('invalid-feedback');
              if (element.prop('type') === 'checkbox') {
                  error.insertAfter(element.parent('label'));
              } else {
                  error.insertAfter(element);
              }
          },
          highlight: function highlight(element) {
              $(element).addClass('is-invalid').removeClass('is-valid');
          },
          unhighlight: function unhighlight(element) {
              $(element).addClass('is-valid').removeClass('is-invalid');
          }
      });
  </script>