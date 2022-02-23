@include('header');
<div class="row">
    <div class="col-md-12">
        <div class="col-md-8">
            <h3 class="text-center"> Spreadsheet Data</h3>
        </div>
        <div class="col-md-4 mt-2">
            <a  href=" {{$url}}write-sheet" class="btn btn-primary"> Write Data</a>
        </div>

        <div class="col-md-4 mt-2">
            <a  href=" {{$url}}append-sheet" class="btn btn-primary"> Append Data</a>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-8 justify-content-center">
        <table class="table table-striped table-dark">
            <tbody>
            @foreach($data as $table)
                <tr>
                    @foreach($table as $raw)
                        <td scope="row">{{$raw}}</td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
</div>
@include('footer');


