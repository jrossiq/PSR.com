<div class="home-contacto container-fluid">
  <div class="row">
    <h3>Contactanos</h3>

    @if(session('message'))
        <div class="alert alert-success message col-md-8 col-md-offset-2">
            <h5>{{ session('message') }}</h5>
        </div>
    @endif

    <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">

      <form action="/contacto" method="post">

          {{ csrf_field() }}

        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <input required minlength="3" type="text" name="name" class="form-control" placeholder="Nombre:">
            </div>
            <div class="form-group">
              <input required type="email" name="email" class="form-control" placeholder="Email:">
            </div>
            <div class="form-group">
              <input type="text" name="subject" class="form-control" placeholder="Asunto:">
            </div>
        </div>

        <div class="col-xs-12 col-sm-6">
          <textarea required minlength="6" class="form-control" name="message" rows="8" cols="80" placeholder="Mensaje"></textarea>
        </div>

        <div class="col-xs-12">
          <div class="line hidden-xs"></div>
          <button type="submit" class="btn btn-default">ENVIAR</button>
        </div>

      </form>

      <div class="clearfix"></div>
      <div class="center">
        <p class="oposicion">NO SOMOS LA OPOSICIÓN</p>
        <p class="resistencia">SOMOS LA RESISTENCIA</p>
        <img class="lazy" data-original="/img/contacto.png" alt="">
      </div>

    </div>

  </div>
</div>

<div id="form-result" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      <div class="top">
        <img class="w"  src="/img/azul.jpg" alt="">
        <p>
          <span class="fnombre"></span>
          <span>¡Gracias por escribirnos!</span>
          <span class="r">Nos comunicaremos a la brevedad con vos</span>
        </p>
      </div>
      <div class="bottom">
        <img class="w hidden-xs hidden-sm" src="/img/gris.jpg" alt="">
        <img  class="l" src="/img/logo_contacto.png" alt="">
      </div>

      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
