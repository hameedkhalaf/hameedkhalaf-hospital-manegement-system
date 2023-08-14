<!-- Modal -->
<div class="modal fade" id="update_status{{ $doctor->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ trans('Dashboard/doctors.change_status_for') }} <span>{{$doctor->name}}</span> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('doctors.update_status') }}" method="post" autocomplete="off">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group">
                        <label for="status">{{trans('Dashboard/doctors.status')}}</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="" selected disabled>{{trans('Dashboard/doctors.choose_status')}}--</option>
                            <option value="1">{{trans('Dashboard/doctors.enabled')}}</option>
                            <option value="0">{{trans('Dashboard/doctors.not_enabled')}}</option>
                        </select>
                    </div>

                    <input type="text" name="id" value="{{ $doctor->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/doctors.close')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('Dashboard/doctors.update')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
