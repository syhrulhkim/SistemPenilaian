{{-- @extends('staff/layout/staff_template') --}}
{{-- @section('title','Staff | Master') --}}

{{-- @section('content') --}}

<body>

    <div class="wrapper">
        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid ">

                   <!-- Board Score -->
                    <button type="button" id="sidebarCollapse" class="btn btn-dark">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                   
                     <!-- User -->
                    <ul class="nav navbar-nav ml-4">
                      <li class="nav-item active">
                        <a class="nav-link font-weight-bold" style="text-transform:uppercase" >{{ Auth::user()->name }}</a>
                      </li>
                    </ul>


                </div>
            </nav>
            
            <br>

            <div class="m-3">

              @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{ session('message') }}</strong>.
                </div>	
              @endif

              @if (session('weightage'))
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Sila semak semula butiran pencapaian!</strong>{{ session('weightage') }}.
              </div>	
              @endif

            </div>
            

            <!-- Pencapaian Content  -->
          
            <div class="col-md-auto">
              <div class="card shadow rounded">
                  <div class="card-header font-weight-bold" style="text-transform:uppercase" >KAD SKOR 2021 - KPI</div>

                  <div class="col-sm-auto p-3">
                      <div class="card">
                          <div class="m-3">

                          <form action="{{ route('kpi_save') }}" method="post">  
                                  @csrf

                              <?php
                                  // set start and end year range
                                  $yearArray = range(2021, 2050);
                              ?>              

                              <div class="row">

                                  <div class="col-sm-4 pt-3 " >
                                    <div class="mb-4">
                                        <label class="font-weight-bold" >Fungsi</label>
                                        <select  class="form-control form-control-sm" id="fungsi" name="fungsi">
                                          <option selected value="">N/A</option>
                                          {{-- <option value="Kad Skor Korporat" >Kad Skor Korporat</option> --}}
                                          {{-- <option value="Kewangan" >Kewangan</option> --}}
                                          <option value="Pelanggan" >Pelanggan</option>
                                          <option value="Kecemerlangan Operasi" >Kecemerlangan Operasi</option> 
                                          <option value="Manusia & Proses" >Manusia & Proses</option> 
                                          <option value="Kolaborasi" >Kolaborasi</option>
                                      </select>
                                    </div>
                                  </div>

                                  <div class="col-sm-4 pt-3 " >
                                    <div class="mb-4">
                                        <label class="font-weight-bold " >Objektif KPI</label>
                                        <input type="text" class="form-control form-control-sm" id="objektif" name="objektif">
                                    </div>
                                  </div>                            

                                  <div class="col-sm-4 pt-3 " >
                                    <div class="mb-4">
                                        <label class="font-weight-bold " >Metrik / Bukti</label>
                                        <br><textarea name="bukti" id="bukti" cols="30" rows="10"></textarea>
                                    </div>
                                  </div>
                                  
                              </div>

                              
                            
                              <div class="row m-auto">
                              
                              
                                {{-- Score KPI --}}
                                  <table class="table table-bordered sticky-top bg-light bg-gradient text-dark">
                                    <tr>
                                        <th class="w-25" >Gred : 
                                            <input class="font-weight-bold w-50 btn-sm btn btn-outline-secondary ml-2" id="grade" name="grade" value="NO GRADE" readonly>
                                        </th>
                                        <th class="w-25" >Total Score : 
                                            <input class="font-weight-bold w-50 bg-light btn-sm btn btn-outline-secondary ml-2" id="percentage-total" name="total_score" value="0" readonly>
                                        </th>
                                        <th class="w-25" >Total Weightage : 
                                            <input class="font-weight-bold w-50 bg-light btn-sm btn btn-outline-secondary ml-2" id="percentage-weightage" name="weightage" readonly>
                                        </th>
                                    </tr>
                                </table>
                                <div class="table-responsive">
                                  <table class="table table-bordered text-center">
                                      <thead class="thead-dark">
                                          <tr>
                                              <th rowspan="2">Peratus (%)</th>
                                              <th rowspan="2">Ukuran</th>
                                              <th colspan="3">KPI Targets</th>
                                              <th rowspan="2">Pencapaian</th>
                                              <th rowspan="2">Skor KPI</th>
                                              <th rowspan="2">Skor Sebenar</th>
                                          </tr>
                                          <tr>
                                              <th scope="col" >Threshold</th>
                                              <th scope="col" >Base</th>
                                              <th scope="col" >Stretch</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>

                                            <td class="font-weight-bold border-dark">
                                              <input type="text" maxlength="3" class="input_ukuran w-75" id="peratus" name="peratus" onkeyup="masterClac();" min="0"  >
                                            </td>

                                            <td style="word-break: break-all;" class="border-dark">
                                              <select class="form-select form-select-sm" id="ukuran" name="ukuran">
                                                <option selected disabled value=""></option>
                                                <option value="N/A">N/A</option>
                                                <option value="Quantity" >Quantity</option>
                                                <option value="Ratio" >Ratio</option>
                                                <option value="Rating" >Rating</option>
                                                <option value="Percentage (%)" >Percentage(%)</option>  
                                                <option value="Date (dd/mm/yyyy)"  >Date (dd/mm/yyyy)</option> 
                                                <option value="Month/Year"  >Month/Year</option> 
                                                <option value="Quarter"  >Quarter</option>
                                                <option value="Hours" >Hours</option> 
                                                <option value="RM (billion)" >RM (billion)</option>
                                                <option value="RM (million)" >RM (million)</option> 
                                                <option value="RM (*000)" >RM (*000)</option>
                                                <option value="KM/Miles" >KM/Miles</option>
                                              </select>
                                            </td>

                                            <td class="font-weight-bold border-dark">
                                              <input type="text" maxlength="4" class="input_threshold w-75" id="threshold" name="threshold" onkeyup="masterClac();" min="0" >
                                            </td>
                                      
                                            <td class="font-weight-bold border-dark">
                                              <input type="text" maxlength="4" class="input_base w-75" id="base" name="base" onkeyup="masterClac();" min="0" >
                                            </td>
                                      
                                            <td class="font-weight-bold border-dark">
                                              <input type="text" maxlength="4" class="input_stretch w-75" id="stretch" name="stretch" onkeyup="masterClac();" min="0" >
                                            </td>
                                      
                                            <td class="font-weight-bold border-dark">
                                              <input type="text" maxlength="4"  class="input_pencapaian w-75" id="pencapaian" name="pencapaian" onkeyup="masterClac();" min="0" >
                                            </td>
                                      
                                            <td class="font-weight-bold border-dark">
                                              <input type="text" class="form-control " id="skor_KPI" name="skor_KPI" value="0" readonly>
                                            </td>
                                      
                                            <td class="font-weight-bold border-dark">
                                              <input type="text"  class="form-control"  id="skor_sebenar" name="skor_sebenar" value="0" readonly>
                                            </td>


                                          </tr>
                                      </tbody>
                                  </table>

                              </div>    
                                <caption>**pastikan maklumat profil lengkap sebelum hantar</caption><br>
                                <caption>**maklumat pencapaian ini terus hantar ke pengurus jabatan</caption>
                              </div>

                              <div class="p-3" style="text-align: right">
                                <button type="submit" class="btn btn-sm btn-success" ><i class="fas fa-save"></i> Simpan Pencapaian</button>                           
                              </div>

                            </div>

                        </form>

                      </div>
                  </div>
              </div>     
          </div>

          <br>
            
          <div class="card m-3">

            <div class="card-header font-weight-bold" style="text-transform:uppercase" >Maklumat Pencapaian</div>
            <div class="table-responsive">
              <table  class="table table-bordered text-center">
                  <thead class="thead-dark">
                    <tr>
                      <th>No.</th>
                      <th >Pencapaian</th>
                      <th >Skor Sebenar</th>
                      <th >Grade</th>
                      <th >Tahun / Bulan</th>
                      <th >Created At</th>
                      <th >Updated At</th>
                      {{-- <th >Penilaian </th> --}}
                      <th class="w-25" ><i class="fas fa-cogs"></i></th>
                    </tr>
                  </thead>
                  <tbody >
                      <!-- Display Body --> 
                      @php($i = 1)
                      {{-- @foreach ($pencapaian as $markah)
                        
                      <tr class="font-weight-bold">
                        
                          <td class="border-dark">{{ $i++  }}</td>
                          <td class="border-dark">{{ $markah -> objektif }}</td>
                          <td class="border-dark">{{ round($markah -> score,2) }} %</td>
                          <td class="border-dark">{{ $markah -> status }}</td>
                          <td class="border-dark">{{ $markah -> tahun }} / {{ $markah -> bulan }}</td>
                          <td class="border-dark">{{ $markah -> created_at -> toDayDateTimeString() }}</td>
                          <td class="border-dark">{{ $markah -> updated_at -> toDayDateTimeString() }}</td>
                          <td class="border-dark">
                            <a href="{{ url('staff/edit/'.$markah->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Pencapaian</a>
                            <a href="{{ url('staff/bukti/edit/'.$markah->id) }}" class="btn btn-warning btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Bukti/Metrik</a>
                            <a href="{{ url('staff/delete/'.$markah->id) }}" class="btn btn-danger btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-trash"></i></a>
                          </td>
                          
                      </tr>

                      @endforeach --}}
                  </tbody> 
              </table>
            </div>
          </div>

        </div>
    </div>

   <!-- Master Pencapaian JS -->
  <script src="{{asset('js/master.js')}}"></script>
  
  </body>
  {{-- @endsection --}}