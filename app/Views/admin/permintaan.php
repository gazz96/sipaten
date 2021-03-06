<?php $this->extend('admin/layouts'); ?>

<?php $this->section('sidebarMenu'); ?>

    <li class="nav-item">
        <a href="<?php echo base_url('/dashboard/permintaan') ?>" class="nav-link">
            <i class="nav-icon far fa-image"></i>
            <p>Permintaan</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?php echo base_url('/dashboard/users') ?>" class="nav-link">
            <i class="nav-icon far fa-user"></i>
            <p>Users</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?php echo base_url('/dashboard/roles') ?>" class="nav-link">
            <i class="nav-icon far fa-star"></i>
            <p>Roles</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="<?php echo base_url('/dashboard/survey') ?>" class="nav-link">
            <i class="nav-icon far fa-star"></i>
            <p>Survey</p>
        </a>
    </li>

<?php $this->endSection(); ?>

<?php $this->section('content'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $title; ?></h1>
          </div>
          <div class="col-sm-6">
            <?php echo $breadcrumb; ?>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-3">
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#form-modal" class="btn btn-primary mb-3">Tambah Data</a>
                </div>
                <div class="col-12 col-md-9">
                    <form class="w-100" id="filter-form">

                        <div class="form-row d-flex justify-content-end">
                            <div class="form-group col-12 col-md-4">
                                <input type="text" class="form-control" placeholder="Search" id="filter-search">
                            </div>
                        </div>

                        
                    
                    </form>
                </div>

                <div class="col-12">
                    <div><?php echo $table; ?></div>
                    <div id="pagination-wrapper"></div>
                </div>
            </div>    
        </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

    
    <!-- Modal -->
    <div class="modal fade" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div> -->
                <div class="modal-body">
                    <form action="" id="form">

                        <input type="hidden" name="truth_action" id="i-truth_action" value="">
                        <input type="hidden" name="id_permintaan" id="i-id_permintaan">
                        <input type="hidden" name="_method" value="POST">

                        <div class="form-group">
                            <label for="i-role_name">Permintaan Oleh</label>
                            <select name="permintaan_user" id="i-permintaan_user" class="form-control">
                                <option value="">Pilih</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="i-nama_pekerjaan">Nama pekerjaan</label>
                            <input type="text" name="nama_pekerjaan" class="form-control" id="i-nama_pekerjaan">
                        </div>

                        <div class="form-group">
                            <label for="i-permintaan_lokasi_survey">Lokasi Survey</label>
                            <input type="text" name="permintaan_lokasi_survey" class="form-control" id="i-permintaan_lokasi_survey">
                        </div>

                        <div class="form-group">
                            <label for="i-permintaan_jadwal_survey">Jadwal Survey</label>
                            <input type="date" name="permintaan_jadwal_survey" class="form-control" id="i-permintaan_jadwal_survey">
                        </div>

                        <div class="form-group">
                            <label for="i-permintaan_status">Status</label>
                            <select name="permintaan_status" id="i-permintaan_status" class="form-control">
                                <option value="Draft">Draft</option>
                                <option value="Negosiasi">Negosiasi</option>
                                <option value="Publish">Publish</option>
                                <option value="Kontrak">Kontrak</option>
                            </select>
                        </div>

                        <button class="btn btn-primary" id="js-save">Buat Permintaan</button>

                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div> -->
            </div>
        </div>
    </div>

    <!-- BOQ Modal -->
    <div class="modal fade" id="modal-boq" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">BOQ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    
                    <form action="" id="form-boq">
                        <input name="id_survey" type="hidden" id="i-id_survey">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Qty</th>
                                        <th>Unit</th>
                                        <th>Harga Pokok</th>
                                        <th>Harga Jual</th>
                                        <th>Margin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    <tr>
                                        <th>
                                            <input name="items[name]" type="text" class="form-control" placeholder="Masukann Nama item" value="" id="i-survey_item_name">
                                        </th>
                                        <th width="100">
                                            <input name="items[qty]" type="text" class="form-control" placeholder="Masukan Qty" value="" id="i-survey_item_qty">
                                        </th>
                                        <th width="100">
                                            <input name="items[unit]" type="text" class="form-control" placeholder="Masukan Unit" value="" id="i-survey_item_unit">
                                        </th>
                                        <th>
                                            <input name="items[harga_pokok]"
                                            type="number" 
                                            class="form-control" 
                                            placeholder="Masukan Harga Pokok" 
                                            value=""
                                            id="i-survey_harga_pokok">
                                        </th>
                                        <th>
                                            <div class="d-flex align-items-center">

                                                <input 
                                                    name="item[harga_jual]" 
                                                    type="number" 
                                                    class="form-control mr-2" 
                                                    placeholder="Masukan Harga Jual" 
                                                    id="i-survey_harga_jual"
                                                    value=""
                                                    >
                                            </div>
                                        </th>
                                        <th></th>
                                        <th>
                                            <a href="javascript:void(0)" class="btn btn-primary js-add-item"><span class="fas fa-plus"></span></a>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>
    <!-- /BOQ Modal -->

<?php $this->endSection(); ?>


<?php $this->section('footerScript') ?>

<script>
    $(function(){

        let truthAction = $('#i-truth_action');
        let tableData = $('#table-data');
        let form = $('#form');

        loadData();
        function loadData(data = {}) {
            
            tableData.find('tbody').html(`
                <tr>
                    <td colspan="7">Loading...</td>
                </tr>
            `);

            $.ajax({
                url: "<?php echo base_url('/api/permintaan') ?>",
                data: data,
                success: function(response) {
                    console.log(response);
                    let html =  ``;

                    // `<td><a href="javascript:void(0)" data-toggle="table-action" data-action="create-timeline" data-id="${v.id_permintaan}">Buat Timeline</a></td><td><a href="">Berkas</a></td>`
                    response.data.lists.map((v, i) => {
                        html += `
                        
                            <tr>
                                <td>${v.nama_pekerjaan}</td>
                                <td>${v.user_fullname}</td>
                                <td>${v.permintaan_status}</td>
                                <td>${v.date_create}</td>
                                <td>
                                    <ul>
                                        <li><a href="javascript:void(0)" data-toggle="table-action" data-action="loadTeknikBoq" data-permintaan="${v.id_permintaan}" data-survey="${v.id_survey}">Teknik</a></li>
                                        <li><a href="javascript:void(0)" data-toggle="table-action" data-action="loadPemasaranBoq" data-permintaan="${v.id_permintaan}" data-survey="${v.id_survey}">Pemasaran</a></li>
                                    </ul>
                                </td>
                                <td>

                                    <a href="javascript:void(0)" class="btn btn-warning mb-2" title="Edit Permintaan" data-toggle="table-action" data-action="edit" data-id="${v.id_permintaan}">
                                        <span class="fas fa-edit"></span>
                                    </a>
                                    
                                    <a href="javascript:void(0)" class="btn btn-danger mb-2" title="Hapus Permintaan" data-toggle="table-action"  data-action="delete" data-id="${v.id_permintaan}">
                                        <span class="fas fa-trash"></span>
                                    </a>

                                    <a href="javascript:void(0)" class="btn btn-primary mb-2" title="Lihat Berkas" data-toggle="table-action"  data-action="delete" data-id="${v.id_permintaan}">
                                        <span class="fas fa-file"></span>
                                    </a>

                                </td>
                            </tr>
                        
                        `
                    })

                    tableData.find('tbody').html(html);
                    $('#pagination-wrapper').html(response.data.pagination);
                }
            })

        }

        getUsers()
        .then(response => {
            let html = '<option value="">Pilih</option>';

            response.data.lists.map((v, i) => {
                html += `<option value="${v.id_user}">${v.user_fullname} - ${v.role_name}</option>`;
            })

            $('#i-permintaan_user').html(html);

        });


        function getUsers() {

            return $.ajax({
                url: "<?php echo base_url('/api/users?page_group1=-1') ?>",
            })

        }


        function addData() {

            let data = form.serialize();

            return $.ajax({
                method: 'POST',
                url: "<?php echo base_url('/api/permintaan') ?>",
                data: data, 
                success: function(response) {
                    console.log('success response add', response);
                    switch(response.code) {

                        case 200: 
                            Toast('success', 'Berhasil menambahkan data');
                            clearForm();
                            loadData();
                        break;

                        case 400:
                            Toast('error', response.message);
                            break;

                    }
                    
                }, 
                error: function(response) {
                    Toast('error', 'Something Wrong!!!');
                }
            })

        }

        function updateData() {
            
            let data = form.serialize();

            return $.ajax({
                method: 'POST',
                url: "<?php echo base_url('/api/permintaan/update') ?>",
                data: data, 
                success: function(response) {
                    console.log('success response add', response);

                    switch(response.code) {

                        case 200: 
                            Toast('success', 'Berhasil memperbaharui data');
                            clearForm();
                            loadData();
                        break;

                        case 400:
                            Toast('error', response.message);
                            break;
                    }
                    
                }, 
                error: function(response) {
                    console.log(response)
                    Toast('error', 'Something Wrong!!!');
                }
            })
        }
        
        function getData( id ) {
            
            return $.ajax({
                url: `<?php echo base_url('/api/permintaan/show') ?>/${id}`,
                success: function(response) {

                    truthAction.val('update');

                    for(data in response.data) {
                        $('#i-' + data).val(response.data[data]);
                    }
                    
                    $('#form-modal').modal('show');
                }
            })

        }

        function deleteData( id ) {
            return $.ajax({
                method: 'POST',
                url: `<?php echo base_url('/api/permintaan') ?>/${id}/delete`,
                success: function(response) {
                    switch(response.code) {
                        case 200:
                            Toast('success', 'Data berhasil dihapus');
                            loadData();
                            break;

                        case 400:
                            Toast('warning', response.message);
                            break;
                    }
                },
                error: function(response) {
                    Toast('error','Something Wrong!!');
                }
            })
        }

        function saveData() {

            if(truthAction.val() == 'update') updateData();
            else addData();

        }

        function clearForm() {
            $('#form')[0].reset();
        }


        $('#js-save').click(function(e){{
            e.preventDefault();
            saveData();
        }})

        $(document).on('click', '#pagination-wrapper .page-item', function(e){
            e.preventDefault();

            let pagination = $(this).data('ci-pagination');

            console.log('ci-pagination', pagination);

            loadData({
                page_group1: pagination
            })
        
        })

        function loadHasilSurvey( id_survey ) {

            return $.ajax({
                url: "<?php echo base_url('/api/survey/item/load') ?>",
                data: {
                    id_survey: id_survey 
                }
            })

        }

        $(document).on('click', '[data-toggle=table-action]', function(e){
            e.preventDefault();
            
            let btn = $(this);
            let action = btn.data('action');


            btn.html(`<span class="fas fa-spin fa-spinner"></span>`);

            console.log(action);
            switch(action) {    
                case 'edit':

                    getData($(this).data('id'))
                    .then(() => btn.html(`<span class="fas fa-edit"></span>`));

                    break;

                case 'delete':

                    let tryToDelete = confirm('DELETE ???');

                    if(tryToDelete) {
                        deleteData($(this).data('id'))
                        .then(() => btn.html(`<span class="fas fa-trash"></span>`))
                    }else {
                        btn.html(`<span class="fas fa-trash"></span>`)
                    }

                    break;

                case 'loadTeknikBoq':
                    $('#modal-boq').modal('show');

                    $('#i-id_survey').val(btn.data('survey'));

                    loadHasilSurvey(btn.data('survey'))
                    .then(response => {


                        let html = '';

                        response.data.lists.map((v, i) => {
                            html += `
                                <tr>
                                    <th>
                                        <input name="items[name][${v.id_survey_item}]" type="text" class="form-control" placeholder="Masukann Nama item" value="${v.survey_item_name}">
                                    </th>
                                    <th width="100">
                                        <input name="items[qty][${v.id_survey_item}]" type="text" class="form-control" placeholder="Masukan Qty" value="${v.survey_item_qty}">
                                    </th>
                                    <th width="100">
                                        <input name="items[unit][${v.id_survey_item}]" type="text" class="form-control" placeholder="Masukan Unit" value="${v.survey_item_unit}">
                                    </th>
                                    <th>
                                        <input 
                                            name="items[harga_pokok][${v.id_survey_item}]"
                                            type="number" 
                                            class="form-control" 
                                            placeholder="Masukan Harga Pokok" 
                                            value="${v.survey_harga_pokok}"
                                            data-toggle="get-margin"  
                                            data-action="harga-pokok"
                                            data-bind="#js-harga-jual-${v.id_survey_item}"
                                            data-target="#js-margin-${v.id_survey_item}"
                                            id="js-harga-pokok-${v.id_survey_item}">
                                    </th>
                                    <th>
                                        <div class="d-flex align-items-center">
                                            <input 
                                                name="item[harga_jual][${v.id_survey_item}]" 
                                                type="number" class="form-control mr-2" 
                                                placeholder="Masukan Harga Jual" 
                                                value="${v.survey_harga_jual}"
                                                data-toggle="get-margin" 
                                                data-action="harga-jual"
                                                data-bind="#js-harga-pokok-${v.id_survey_item}"
                                                data-target="#js-margin-${v.id_survey_item}"
                                                id="js-harga-jual-${v.id_survey_item}">
                                                                                        
                                        </div>
                                    </th>
                                    <th id="js-margin-${v.id_survey_item}"></th>
                                    <th>
                                        <a href="javascript:void(0)" data-item="${v.id_survey_item}" class="btn btn-danger js-remove-item"><span class="fas fa-minus"></span></a>
                                        <a href="javascript:void(0)" data-item="${v.id_survey_item}" class="btn btn-warning js-update-item"><span class="fas fa-pen"></span></a>
                                    </th>
                                </tr>
                            `;

                            
                        })

                        $('#form-boq').find('tbody').html(html);

                        btn.html('Teknik')

                    })
                    break;

                case 'loadPemasaranBoq':
                    
                    $('#modal-boq').modal('show');
                    break;

                case 'create-timeline': 
                    
                    break;
            }
        })

        function getFilters() {

            let filters = [];

            if(($('#filter-search').val())) {

                filters.push({ key: 'search', value: $('#filter-search').val() })

            }

            return filters;
        }


        $('[data-toggle=sort]').click(function(e){
            
            e.preventDefault();

            let currentPagination = $('#pagination-wrapper .page-item.active').find('a').data('ci-pagination')
            let order = $(this).data('sort');
            let orderby = $(this).data('field');
            loadData({
                page_group1: currentPagination,
                orders: [{
                    orderby: orderby,
                    order: order,
                }],
                filters: getFilters()
            })
        })


        $('#filter-search').keyup(function(){

            let dataToggleSort = $('[data-toggle=sort]');
            let order = dataToggleSort.data('sort');
            let orderby = dataToggleSort.data('field');


            console.log()
            
            loadData({
                //orders: [{ orderby: orderby, order: order }],
                filters: [
                    { key: 'search', value: $(this).val() }
                ]
            })
        })


        $('.js-add-item').click(function(e){

            addHasilSurvey()

        });

        function addHasilSurvey() {
            
            let id_survey   = $('#i-id_survey').val();
            let item        = $('#i-survey_item_name').val();
            let qty         = $('#i-survey_item_qty').val();
            let unit        = $('#i-survey_item_unit').val();
            let harga_pokok = $('#i-survey_harga_pokok').val();
            let harga_jual  = $('#i-survey_harga_jual').val();

            let data =  {
                id_survey: id_survey,
                survey_item_name: item,
                survey_item_qty: qty,
                survey_item_unit: unit,
                survey_harga_pokok: harga_pokok,
                survey_harga_jual: harga_jual                            
            }

            return $.ajax({
                method: 'POST',
                url: "<?php echo base_url('/api/survey/item/add') ?>",
                data: data, 
                success: function(response) {

                    console.log('success response add', response);
                    
                    switch(response.code) {

                        case 200: 

                            Toast('success', 'Berhasil menambahkan data');

                            html = `
                                <tr>
                                    <th>
                                        <input name="items[name][${response.data.item.id_survey_item}]" type="text" class="form-control" placeholder="Masukann Nama item" value="${response.data.item.survey_item_name}">
                                    </th>
                                    <th width="100">
                                        <input name="items[qty][${response.data.item.id_survey_item}]" type="text" class="form-control" placeholder="Masukan Qty" value="${response.data.item.survey_item_qty}">
                                    </th>
                                    <th width="100">
                                        <input name="items[unit][${response.data.item.id_survey_item}]" type="text" class="form-control" placeholder="Masukan Unit" value="${response.data.item.survey_item_unit}">
                                    </th>
                                    <th>
                                        <input 
                                            name="items[harga_pokok][${response.data.item.id_survey_item}]"
                                            type="number" 
                                            class="form-control" 
                                            placeholder="Masukan Harga Pokok" 
                                            value="${response.data.item.survey_harga_pokok}"
                                            data-toggle="get-margin"  
                                            data-action="harga-pokok"
                                            data-bind="#js-harga-jual-${response.data.item.id_survey_item}"
                                            data-target="#js-margin-${response.data.item.id_survey_item}"
                                            id="js-harga-pokok-${response.data.item.id_survey_item}">
                                    </th>
                                    <th>
                                        <div class="d-flex align-items-center">
                                            <input 
                                                name="item[harga_jual][${response.data.item.id_survey_item}]" 
                                                type="number" class="form-control mr-2" 
                                                placeholder="Masukan Harga Jual" 
                                                value="${response.data.item.survey_harga_jual}"
                                                data-toggle="get-margin" 
                                                data-action="harga-jual"
                                                data-bind="#js-harga-pokok-${response.data.item.id_survey_item}"
                                                data-target="#js-margin-${response.data.item.id_survey_item}"
                                                id="js-harga-jual-${response.data.item.id_survey_item}">
                                            <a href="javascript:void(0)" data-item="${response.data.item.id_survey_item}" class="btn btn-danger js-remove-item"><span class="fas fa-minus"></span></a>                                            
                                        </div>
                                    </th>
                                    <th id="js-margin-${response.data.item.id_survey_item}"></th>
                                </tr>
                            `;

                            $('#form-boq')
                                .find('tbody')
                                .append(html);

                            $('#i-id_survey').val('');
                            $('#i-survey_item_name').val('');
                            $('#i-survey_item_qty').val('');
                            $('#i-survey_item_unit').val('');
                            $('#i-survey_harga_pokok').val('');
                            $('#i-survey_harga_jual').val('');
                            break;

                        case 400:
                            Toast('error', response.message);
                            break;
                    }
                    
                }, 
                error: function(response) {
                    Toast('error', 'Something Wrong!!!');
                }
            })


        }

    })
</script>

<?php $this->endSection(); ?>