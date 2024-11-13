                
                    <div class="col-md-8">            
                    <!-- Income and Express -->
                    <div class="card card-default">
                      <div class="card-header">
                        <h2>Overall Sales</h2>
                      </div>
                      <div class="card-body">
                        <div class="chart-wrapper">
                        <div>
                            {{ $chartdata->container() }}
                        </div>
                        </div>
                      </div>

                    </div>
                  </div>
                  {{ $chartdata->script() }}
