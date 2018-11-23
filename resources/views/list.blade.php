@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
    <br>
<div class="container">
    <div class="row">
        <div class="col-lg-offset-3 col-lg-6">
                <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title">Verlanglijstje <a href="#" id="addNew" class = "pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></a></h3>
                        </div>
                        <div class="panel-body" >
                                <ul class="list-group" id="items">
                                  @foreach ($items as $item)
                                <li class="list-group-item OnsItem" data-toggle="modal" data-target="#myModal">{{$item->item}}
                                <input type="hidden" id="itemId" value="{{$item->id}}">
                                </li>
                                  @endforeach
                                      </ul>
                        </div>
                      </div>            
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="title">Voeg nieuwe wens toe</h4>
                    </div>
                    <div class="modal-body">
                      <input type="hidden" id="id">
                      <p><input type="text" placeholder="Voer hier je wens in" id="AddItem" class="form-control"></p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-warning" id="delete" data-dismiss="modal" style="display:none">Verwijder</button>
                      <button type="button" class="btn btn-primary" id="SaveChanges" data-dismiss="modal" style="display:none">Sla veranderingen op</button>
                      <button type="button" class="btn btn-primary" id="AddButton" data-dismiss="modal">Voeg toe!</button>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
    </div>
</div>
@endsection

{{ csrf_field() }}
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>    
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script></body>
<script>
$(document).ready(function() {
  $(document).on('click', '.OnsItem', function(event) { 
       var text = $(this).text();
       var id = $(this).find('#itemId').val();
       var text = $.trim(text);
       $('#title').text('Wijzig Item')
       $('#AddItem').val(text);
       $('#delete').show('400');
       $('#SaveChanges').show('400');
       $('#AddButton').hide('400');
       $('#id').val(id);
       //console.log(text);
     });

  $(document).on('click', '#addNew', function(event) {
       $('#title').text('Voeg wens toe')
       $('#AddItem').val('');
       $('#delete').hide('400');
       $('#SaveChanges').hide('400');
       $('#AddButton').show('400');
     });

     $('#AddButton').click(function(event) {
       var text = $('#AddItem').val();
       if(text == ""){
         alert('Vul aub iets in');
       } else {
        $.post('list', {'text': text, '_token':$('input[name=_token]').val()}, function (data) {
        //console.log(data);
        $('#items').load(location.href + ' #items');
         });
       }

     });
     $('#delete').click(function(event) {
       var id = $('#id').val();
       $.post('delete', {'id' : id, '_token':$('input[name=_token]').val()}, function (data) {
        $('#items').load(location.href + ' #items');
        //console.log(data);     
       });      
     });

     $('#SaveChanges').click(function(event) {
       var id = $('#id').val();
       var value = $.trim($('#AddItem').val());
       $.post('update', {'id' : id,'value' : value, '_token':$('input[name=_token]').val()}, function (data) {
        $('#items').load(location.href + ' #items');
        //console.log(data);
        });
       });
  });

</script>
</html>