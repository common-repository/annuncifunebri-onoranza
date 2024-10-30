<?php $countFiori = count($annuncio['fiori']); ?>
<?php $countRicordiFloreali = count($annuncio['ricordiFloreali']); ?>
<?php $countOpere = count($annuncio['opereBene']); ?>

<div id="annfu_form_cordoglio_wrapper">

    <?php if ($annuncio['abilitatoFotoCordogli'] || $countFiori > 0 || $countRicordiFloreali > 0 || $countOpere > 0): ?>
        <ul id="annfu_tabs" class="nav nav-tabs" role="tablist">
            <li role="presentation" class="nav-item annfu_li_cordoglio">
                <a href="#annfu_form_cordoglio" class="nav-link active" aria-controls="annfu_form_cordoglio" role="tab" data-tab="cordoglio"
                   data-toggle="tab">Lascia un cordoglio</a>
            </li>
            <?php if ($annuncio['abilitatoFotoCordogli']): ?>
                <li role="presentation" class="nav-item annfu_li_foto">
                    <a href="#annfu_form_foto" class="nav-link" aria-controls="annfu_form_foto" role="tab" data-tab="foto"
                       data-toggle="tab">Invia una foto</a>
                </li>
            <?php endif; ?>
            <?php if ($countFiori > 0): ?>
                <li role="presentation" class="nav-item annfu_li_fiori">
                    <a href="#annfu_form_fiori" class="nav-link" aria-controls="annfu_form_fiori" role="tab" data-tab="fiori"
                       data-toggle="tab">Acquista un fiore</a>
                </li>
            <?php endif; ?>
            <?php if ($countRicordiFloreali > 0): ?>
                <li role="presentation" class="nav-item annfu_li_ricordi_floreali">
                    <a href="#annfu_form_ricordi_floreali" class="nav-link" aria-controls="annfu_form_ricordi_floreali" role="tab" data-tab="ricordi_floreali"
                       data-toggle="tab">Ricordo floreale</a>
                </li>
            <?php endif; ?>
            <?php if ($countOpere > 0): ?>
                <li role="presentation" class="nav-item annfu_li_donazioni">
                    <a href="#annfu_donazioni" class="nav-link" aria-controls="annfu_donazioni" role="tab" data-tab="donazioni"
                       data-toggle="tab">Donazioni</a>
                </li>
            <?php endif; ?>
        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="annfu_form_cordoglio">
                <?php include_once('_partecipazioni-cordogli-form.php') ?>
            </div>
            <?php if ($annuncio['abilitatoFotoCordogli']): ?>
                <div role="tabpanel" class="tab-pane" id="annfu_form_foto">
                    <?php include_once('_foto-cordogli-form.php') ?>
                </div>
            <?php endif; ?>
            <?php if ($countFiori > 0): ?>
                <div role="tabpanel" class="tab-pane" id="annfu_form_fiori">
                    <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT.'_fiori.php') ?>
                </div>
            <?php endif; ?>
            <?php if ($countRicordiFloreali > 0): ?>
                <div role="tabpanel" class="tab-pane" id="annfu_form_ricordi_floreali">
                    <?php include_once('_ricordi-floreali.php') ?>
                </div>
            <?php endif; ?>
            <?php if ($countOpere > 0): ?>
                <div role="tabpanel" class="tab-pane" id="annfu_donazioni">
                    <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_donazioni.php') ?>
                </div>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <?php include_once(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_partecipazioni-cordogli-form.php') ?>
    <?php endif; ?>

    <?php include(ANNFU_PLUGIN_PATH_TEMPLATE_DEFAULT . '_testo_fondo_form_cordogli.php') ?>
</div>
