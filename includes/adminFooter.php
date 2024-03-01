<footer class="footer pt-5">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                    © <script>
                        document.write(new Date().getFullYear())
                    </script>,
                    made with <i class="fa fa-heart"></i> by
                    <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Mr Okocha</a>
                    
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">About us</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
            </footer>
        </div>
  </main>

  <script src="bootstrap.bundle.min.js"></script>
  <script src="perfect-scrollbar.min.js"></script>
  <script src="smooth-scrollbar.min.js"></script>

    <!-- Alertifyjs.com -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
        <?php if(isset($_SESSION['message'])){ ?>
            alertify.set('notifier','position', 'top-right');
            alertify.success('<?= $_SESSION['message']?>');
      <?php 
        unset($_SESSION['message']);}
        ?>
         
    </script>

  </body>

</html>