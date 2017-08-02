<div style="margin-top: 75px">
  <div class="row wow fadeIn" data-wow-delay="0.1s">
    <div class="col-md-3">
      <h3>Categorías</h3>
    </div>
    <div class="col-md-9">

    </div>
  </div>
  <div style="height: 75px;"></div>
  <div class="row wow fadeIn" data-wow-delay="0.15s">
    <div class="col-md-3">
      <h3>Créditos</h3>
    </div>
    <div class="col-md-9">
      <h4>Editar valor de compra</h4>
      <?php $this->include('creditos/edit'); ?>
    </div>
  </div>
  <div style="height: 75px;"></div>
  <div class="row wow fadeIn" data-wow-delay="0.2s">
    <div class="col-md-3">
      <h3>Reputaciones</h3>
    </div>
    <div class="col-md-9">
      <h4>Listado de reputaciones</h4>
      <?php $this->include('reputations/reputations'); ?>
      <br/>
      <?php if ($this->router->getId()): ?>
        <h4>Editar reputación</h4>
        <?php $this->include('reputations/edit'); ?>
      <?php endif; ?>
      <h4>Agregar reputación</h4>
      <?php $this->include('reputations/add'); ?>
    </div>
  </div>
</div>
