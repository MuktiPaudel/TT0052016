<!-- SELECT2 EXAMPLE -->
 <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Please make your search.</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
<form action="{{action('Teleamp_Controller@filters')}}"  role="form" method="post">
  {{ csrf_field() }}
  <input type="hidden" name="page" value="amp_database">
         <div class="box-body">
    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          <label>Field</label>
          <select id="fields" name="fields" class="form-control select2" style="width: 100%;">

                  <option selected="selected" id="fieldFilter">Fields</option>
                        @foreach ($data as  $row)
                    <option value="{{$row->field_id}}">{{$row->field_name}}</option><br>
                       @endforeach
          </select>

          </select>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="form-group">
          <label>Group</label>
          <select id="groups" name="groups" id="groupFilter" class="form-control select2" style="width: 100%;">
            <option selected="selected">Group</option>
          </select>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="form-group">
          <label>Amplifiers</label>
          <select id="amplifiers" name="amplifiers"  id="ampFilter" class="form-control select2" style="width: 100%;">
            <option selected="selected">Amplifiers</option>
          </select>
        </div>
      </div>

    </div>
         </div>

        <div class="box-footer">
            <button type="submit" id="searchFilter" class="btn btn-success btn-md pull-right">Search</button>
            <button type="submit" class="btn btn-danger btn-md pull-left">Reset</button>
        </div>
      </form>
    </div>
