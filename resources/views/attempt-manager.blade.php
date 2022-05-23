<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Practice - Manage Tests</title>

    <!-- vendor css -->
    <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="../lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="../lib/jquery-switchbutton/jquery.switchButton.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="../css/bracket.css">
</head>

<body class="collapsed-menu with-subleft">

    <!-- =========== START: LEFT PANEL =========== -->
    @include('layouts.lpanel')
    <!-- ============ END: LEFT PANEL ============ -->


    <!-- =========== START: HEAD PANEL =========== -->
    @include('layouts.hpanel')
    <!-- ============ END: HEAD PANEL ============ -->


    <!-- ========== START: RIGHT PANEL =========== -->
    @include('layouts.rpanel')
    <!-- =========== END: RIGHT PANEL ============ -->

    <!-- =========== START: MAIN PANEL =========== -->
    <div class="br-subleft">
        <h6 class="tx-uppercase tx-10 tx-mont tx-spacing-1 mg-t-10 pd-x-10 tx-white-7">Filter Attempts</h6>

        <div class="mg-t-20 pd-x-10 mg-b-40">
            <div class="form-group">
                <input type="text" class="form-control form-control-inverse tx-13" placeholder="Enter Attempt Title">
            </div><!-- form-group -->
            <div class="form-group">
                <select class="form-control form-control-inverse tx-13 select1" data-placeholder="Course">
                    <option label="Course"></option>
                    <option value="1"> CS 145 </option>
                    <option value="2"> CS 192 </option>
                    <option value="3"> CS 9000 </option>
                </select>
            </div><!-- form-group -->
            <button class="btn btn-info btn-block tx-uppercase tx-10 tx-mont tx-spacing-2 tx-medium">Filter
                List</button>
        </div>

        <h6 class="tx-uppercase tx-10 mg-t-40 pd-x-10 bd-b pd-b-10 tx-roboto tx-white-7">Recently Accessed</h6>

        <nav class="nav br-nav-mailbox flex-column">
            <a href="" class="nav-link"><i class="icon ion-ios-folder-outline"></i> Test 1</a>
            <a href="" class="nav-link"><i class="icon ion-ios-folder-outline"></i> Test 2</a>
            <a href="" class="nav-link"><i class="icon ion-ios-folder-outline"></i> Test 3</a>
            <a href="" class="nav-link"><i class="icon ion-ios-folder-outline"></i> Test 4</a>
        </nav>
    </div><!-- br-subleft -->

    <div class="br-contentpanel">
        <div class="br-pageheader pd-y-15 pd-md-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="\">Home</a>
                <a class="breadcrumb-item" href="\">Pages</a>
                <span class="breadcrumb-item active">Attempt Manager</span>
            </nav>
        </div><!-- br-pageheader -->

        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">Test Results</h4>
            <p class="mg-b-0">See your test results here</p>
        </div>

        <div class="br-pagebody pd-x-20 pd-sm-x-30">
            <div class="card bd-0 shadow-base">
                <table class="table mg-b-0">

                    <thead>
                        <tr>
                            <th class="wd-5p hidden-xs-down">ID</th>
                            <th class="tx-10-force tx-mont tx-medium">Test Name</th>
                            <th class="tx-10-force tx-mont tx-medium hidden-xs-down">Date Created</th>
                            <th class="tx-10-force tx-mont tx-medium hidden-xs-down">Author</th>
                            <th class="tx-10-force tx-mont tx-medium hidden-xs-down">Taken by</th>
                            <th class="tx-10-force tx-mont tx-medium hidden-xs-down">Course</th>
                            <th class="tx-10-force tx-mont tx-medium hidden-xs-down">Score</th>
                            <th class="wd-5p"></th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($attempts as $attempt)
                        <tr>
                            <td class="hidden-xs-down"> {{ $attempt->id }} </td>
                            <td>
                                <!--<i class="icon ion-document-text tx-24 tx-warning lh-0 valign-middle"></i>-->
                                <i class="fa-regular fa-book tx-22 tx-danger lh-0 valign-middle"></i>
                                <span class="pd-l-5"> {{  $attempt->test->title }} </span>
                            </td>
                            <td class="hidden-xs-down"> {{ $attempt->created_at }} </td>
                            <td class="hidden-xs-down"> {{  $attempt->test->user()->first()->first_name.' '. $attempt->test->user()->first()->last_name }} </td>
                            <td class="hidden-xs-down"> {{  $attempt->user()->first()->first_name.' '. $attempt->user()->first()->last_name }} </td>
                            <td class="hidden-xs-down"> {{  $attempt->test->course->title }} </td>
                            <td class="hidden-xs-down"> {{  $attempt->score }}/{{  $attempt->test->count }} </td>
                            <td class="dropdown">
                                <a href="/test/{{ $attempt->test->id }}/attempt/{{ $attempt->id }}" class="btn pd-y-3 tx-gray-500 hover-info"><i class="fa fa-search"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $attempts->links('layouts.pagination') }}

            </div>
        </div><!-- br-pagebody -->

        <footer class="br-footer">
            <div class="footer-left">
                <div class="mg-b-2">Filter Info:</div>
                <div>name, handler</div>
            </div>
        </footer>
    </div><!-- br-contentpanel -->

    <!-- ============ END: MAIN PANEL ============ -->

    <script src="../lib/jquery/jquery.js"></script>
    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>
    <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../lib/moment/moment.js"></script>
    <script src="../lib/jquery-ui/jquery-ui.js"></script>
    <script src="../lib/jquery-switchbutton/jquery.switchButton.js"></script>
    <script src="../lib/peity/jquery.peity.js"></script>

    <script src="../js/bracket.js"></script>
    <script>
        $(function () {
            'use strict';

            // show only the icons and hide left menu label by default
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');

            $(document).on('mouseover', function (e) {
                e.stopPropagation();
                if ($('body').hasClass('collapsed-menu')) {
                    var targ = $(e.target).closest('.br-sideleft').length;
                    if (targ) {
                        $('body').addClass('expand-menu');

                        // show current shown sub menu that was hidden from collapsed
                        $('.show-sub + .br-menu-sub').slideDown();

                        var menuText = $('.menu-item-label,.menu-item-arrow');
                        menuText.removeClass('d-lg-none');
                        menuText.removeClass('op-lg-0-force');

                    } else {
                        $('body').removeClass('expand-menu');

                        // hide current shown menu
                        $('.show-sub + .br-menu-sub').slideUp();

                        var menuText = $('.menu-item-label,.menu-item-arrow');
                        menuText.addClass('op-lg-0-force');
                        menuText.addClass('d-lg-none');
                    }
                }
            });

            // Showing sub left menu
            $('#showSubLeft').on('click', function () {
                if ($('body').hasClass('show-subleft')) {
                    $('body').removeClass('show-subleft');
                } else {
                    $('body').addClass('show-subleft');
                }
            });

            /*
            $(document).on("click", ".page-link", function () {
                //get url and make final url for ajax 
                var url = $(this).attr("href");
                var append = url.indexOf("?") == -1 ? "?" : "&";
                var finalURL = url + append;

                //set to current url
                window.history.pushState({}, null, finalURL);

                $.get(finalURL, function (data) {
                    $("#pagination_data").html(data);
                });
                return false;
            })
            */

        });

    </script>
</body>

</html>
