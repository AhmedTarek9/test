@include("livewire.nav")

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
     @livewire('counter')
     @livewire('userlist',['lazy'=>true])
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

</div>
