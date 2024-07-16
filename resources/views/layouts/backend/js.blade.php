  <!-- core:js -->
  <script src="{{ asset('assets/vendors/core/core.js') }}"></script>
  <!-- endinject -->
  <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>

  <!-- Plugin js for this page -->
  <script src="{{ asset('assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
  <!-- End plugin js for this page -->

  <!-- inject:js -->
  <script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
  <script src="{{ asset('assets/js/template.js') }}"></script>
  <!-- endinject -->
  <script src="{{ asset('assets/js/data-table.js') }}"></script>

  <!-- Custom js for this page -->
  <script src="{{ asset('assets/js/dashboard-dark.js') }}"></script>
  <!-- End custom js for this page -->
  {{-- <script src="{{ asset('assets/js/form-validation.js') }}"></script> --}}
  <script src="{{ asset('assets/vendors/easymde/easymde.min.js') }}"></script>

  <script src="{{ asset('assets/js/easymde.js') }}"></script>
  <script src="{{ asset('assets/js/sweetalert2@11.js') }}"></script>
  <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
  <script src="{{ asset('assets/js/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/js/select2.js') }}"></script>

  <script>
      function deleteId(id) {
          const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
              },
              buttonsStyling: false
          })

          swalWithBootstrapButtons.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes, delete it!',
              cancelButtonText: 'No, cancel!',
              reverseButtons: true
          }).then((result) => {
              if (result.value) {
                  // If the user confirms, submit the form
                  document.getElementById('delete_form_' + id).submit();
              } else if (result.dismiss === Swal.DismissReason.cancel) {
                  // If the user cancels, show a message
                  swalWithBootstrapButtons.fire(
                      'Cancelled',
                      'Your data is safe :)',
                      'error'
                  )
              }
          })
      }
  </script>

  <script>
      const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;

      tinymce.init({
          selector: 'textarea#open-source-plugins',
          plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
          editimage_cors_hosts: ['picsum.photos'],
          menubar: 'file edit view insert format tools table help',
          toolbar: "undo redo | bold italic underline strikethrough | align numlist bullist | link image media | forecolor backcolor removeformat | code fullscreen preview",
          autosave_ask_before_unload: true,
          autosave_interval: '30s',
          autosave_prefix: '{path}{query}-{id}-',
          autosave_restore_when_empty: false,
          autosave_retention: '2m',
          image_advtab: true,
          file_picker_callback: function(callback, value, meta) {
              if (meta.filetype === 'image') {
                  const input = document.createElement('input');
                  input.setAttribute('type', 'file');
                  input.setAttribute('accept', 'image/*');

                  input.onchange = function() {
                      const file = this.files[0];
                      const formData = new FormData();
                      formData.append('file', file);

                      const xhr = new XMLHttpRequest();
                      xhr.open('POST', '{{ route('admin.upload.image') }}', true); // Use the named route
                      xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

                      xhr.upload.addEventListener('progress', function(e) {
                          if (e.lengthComputable) {
                              const percentComplete = (e.loaded / e.total) * 100;
                              document.getElementById('progressWrapper').style.display = 'block';
                              document.getElementById('progressBar').style.width =
                                  percentComplete + '%';
                              document.getElementById('progressText').innerText = 'Uploading: ' +
                                  Math.round(percentComplete) + '%';
                          }
                      }, false);

                      xhr.onload = function() {
                          if (xhr.status === 200) {
                              const data = JSON.parse(xhr.responseText);
                              callback(data.location, {
                                  alt: file.name
                              });
                              document.getElementById('progressWrapper').style.display = 'none';
                              document.getElementById('progressText').innerText = 'Uploading...';
                              document.getElementById('progressBar').style.width = '0%';
                          } else {
                              console.error('Upload failed');
                          }
                      };

                      xhr.send(formData);
                  };

                  input.click();
              }
          },
          height: 600,
          image_caption: true,
          quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
          noneditable_class: 'mceNonEditable',
          toolbar_mode: 'sliding',
          contextmenu: 'link image table',
          skin: useDarkMode ? 'oxide-dark' : 'oxide',
          content_css: useDarkMode ? 'dark' : 'default',
          content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
      });

      function previewImage(event) {
          var output = document.getElementById('imagePreview');
          output.src = URL.createObjectURL(event.target.files[0]);
          output.style.display = 'block';
      }
  </script>
