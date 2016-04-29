<div class="par control-group {{ $errors->has('kategori_nama')?'error':'' }}">
    <label class="control-label">Nama Kategori <small>(Wajib Diisi)</small></label>
    <div class="field">
        {!! Form::text('kategori_nama',null,['class' => 'input-xxlarge']) !!}
        {!! $errors->first('kategori_nama','<span class="help-inline warning">:message</span>') !!}
    </div>                
</div>
<p class="stdformbutton">
    <button class="btn btn-primary">Simpan</button>
    <button type="reset" class="btn">Reset</button>
</p>