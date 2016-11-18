<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Post List</title>
    </head>
    <body>
      <nav style="background-color: #0089ec;">
    <div class="nav-wrapper">
      <a href="{{ url('/Logout') }}" style="float: right;  margin-right: 20px;">logout</a>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <?php
if (Session::has('admin')) {
   // echo Session::get('member_id');
    $sess = Session::get('admin');
    ?>
        <li><a ><?php echo  $sess; ?></a></li>
<?php
}
?>
      </ul>
    </div>
  </nav>

        <div class = 'container'>
            <h1>Posts List</h1>
            <div class="row">

                        </div>
            <table>
                <thead>

                    <th>name</th>

                    <th> owner</th>




                    <th>actions</th>
                </thead>
                <tbody>
                    @foreach($pst as $ps)

                    <tr>

                        <td>{{$ps->post}}</td>
                        <?php
                        $members = \DB::select('select * from members where member_id=' . "'$ps->member_id'");
                      foreach ($members as $member) {

                         ?>
                        <td><?php echo $member->name;?></td>
<?php } ?>



                        <td>
                            <div class = 'row'>
                                <a href = '../list/destroy/{{$ps->post_id}}' class = 'delete btn-floating modal-trigger red' data-link = "../public/post/destroy/{{$ps->post_id}}" ><i class = 'material-icons'>delete</i></a>
                                <a href = '../list/edit/{{$ps->post_id}}' class = 'viewEdit btn-floating blue' data-link = '/post/{{$ps->post_id}}/edit'><i class = 'material-icons'>edit</i></a>
                                <a href = '../post/showOne/{{$ps->post_id}}' class = 'viewShow btn-floating orange' data-link = '/post/{{$ps->post_id}}'><i class = 'material-icons'>info</i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
         <?php echo $pst->render(); ?>
        <div id="modal1" class="modal">
            <div class = "row AjaxisModal">
            </div>
        </div>
    </body>
    <script src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
    <script> var baseURL = "{{URL::to('/')}}"</script>
    <script src = "{{ URL::asset('js/AjaxisMaterialize.js')}}"></script>
    <script src = "{{ URL::asset('js/scaffold-interface-js/customA.js')}}"></script>
</html>
