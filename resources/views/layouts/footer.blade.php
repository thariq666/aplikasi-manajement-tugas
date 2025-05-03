    
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sbadmin2/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sbadmin2/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sbadmin2/js/sb-admin-2.min.js')}}"></script>
    <!-- Page level plugins -->
    <script src="{{ asset('sbadmin2/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    
    <!-- Page level custom scripts -->
    <script src="{{ asset('sbadmin2/js/demo/datatables-demo.js')}}"></script>
    <script src="{{ asset('sweetalert2/dist/sweetalert2.all.min.js')}}"></script>

    <!-- Bootstrap 5 (tanpa jQuery) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>



        


        @session('success')
            <script>
                        Swal.fire({
                title: "Berhasil!",
                text: "{{ session('success') }}",
                icon: "success"
                });
            </script>
        @endsession
        @session('error')
            <script>
                        Swal.fire({
                title: "Gagal!",
                text: "{{ session('error') }}",
                icon: "error"
                });
            </script>
        @endsession

</body>

</html>