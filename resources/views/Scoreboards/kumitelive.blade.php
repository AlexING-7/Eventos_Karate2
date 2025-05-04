<x-app-layout>
    <div class="boxed">

        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container">
            <div id="page-head">

                <div class="pad-all text-center">
                    <h3>Welcome back to the Dashboard.</h3>
                    <p1>Scroll down to see quick links and overviews of your Server, To do list, Order status or get
                        some Help using Nifty</p1>

                </div>
            </div>


            <!--Page content-->
            <!--===================================================-->
            <div id="page-content">

                <div class="row">
                    <div class="col-lg-12">

                        <div class="panel">
                            <div class="panel-body ">

                                <h1 class="text-center text-success">EN VIVO</h1>

                            </div>

                        </div>

                    </div>
                    <div class="col-lg-12">

                        @livewire('Kumite.LiveKumite',['id_combate' => $id_combate])

                    </div>
                </div>

            </div>
            <!--===================================================-->
            <!--End page content-->

        </div>
        <!--===================================================-->
        <!--END CONTENT CONTAINER-->
    </div>

 
</x-app-layout>