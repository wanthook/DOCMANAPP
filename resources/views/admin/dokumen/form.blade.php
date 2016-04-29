<div class="par control-group {{ $errors->has('dokumen_file')?'error':'' }}">
    <label class="control-label">File Dokumen <small>(Wajib Diisi)</small></label>
    <div class="field">
        {!! Form::file('dokumen_file',['class' => 'input-xxlarge', 'id' => 'dokumen_file']) !!}
        {!! $errors->first('dokumen_file','<span class="help-inline warning">:message</span>') !!}
    </div>                
</div>
<div class="par control-group {{ $errors->has('dokumen_deskripsi')?'error':'' }}">
    <label class="control-label">Deskripsi <small>(Wajib Diisi)</small></label>
    <div class="field">
        {!! Form::text('dokumen_deskripsi',null,['id' => 'dokumen_deskripsi', 'class' => 'input-xxlarge']) !!}
        {!! $errors->first('dokumen_deskripsi','<span class="help-inline warning">:message</span>') !!}
    </div>                
</div>
<div class="par control-group {{ $errors->has('dokumen_author')?'error':'' }}">
    <label class="control-label">Author <small>(Wajib Diisi)</small></label>
    <div class="field">
        {!! Form::hidden('dokumen_author',null,['id' => 'dokumen_author', 'class' => 'input-xxlarge']) !!}
        {!! $errors->first('dokumen_author','<span class="help-inline warning">:message</span>') !!}
    </div>                
</div>
<div class="par control-group">
    <label class="control-label">Komentar</label>
    <div class="field">
        {!! Form::text('dokumen_komentar',null,['id' => 'dokumen_komentar', 'class' => 'input-xxlarge', 'multiple']) !!}
        {!! $errors->first('dokumen_komentar','<span class="help-inline warning">:message</span>') !!}
    </div>                
</div>
<div class="par control-group">
    <label class="control-label">Izin Departemen</label>
    <div class="field">
        <table class="table table-bordered responsive">
            <thead>
                <tr>
                    <th>Departemen</th>
                    <th>View</th>
                    <th>Download</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Departemen1</td>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                </tr>
            </tbody>
        </table>
    </div>                
</div>
<div class="par control-group">
    <label class="control-label">Izin User</label>
    <div class="field">
        
    </div>                
</div>
<p class="stdformbutton">
    <button class="btn btn-primary">Simpan</button>
    <button type="reset" class="btn">Reset</button>
</p>