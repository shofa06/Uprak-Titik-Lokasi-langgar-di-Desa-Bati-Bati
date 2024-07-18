<!-- Footer -->
<footer class="footer mt-auto py-3 bg-dark">
    <div class="container text-center">
        <p class="text-light mb-0">  Sistem Informasi Geografis | Noor Shofa Safila</p>
    </div>
</footer>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    }); // metode yang dijalankan ketika halaman HTML sudah dimuat

    <?php if (session()->getFlashdata('error')) : ?> // memeriksa apakah ada pesan kesalahan yang diset untuk ditampilkan.
        var addModal = new bootstrap.Modal(document.getElementById('addModal'), {
            keyboard: false
        });
        addModal.show();
    <?php endif; ?>
</script>

</body>

</html>