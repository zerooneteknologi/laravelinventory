
{{-- image company start --}}
<div class="col-md-6 col-xl-4">
    <div class="card mb-3">
        @foreach ($companies as $company)    
            <img class="img-fluid card-img-top" src="{{ asset('storage/' . $company->companyPhoto);}}" alt="{{ $company->companyName}}">
            <div class="card-body">
                <h5 class="card-title">{{ $company->companyName}}</h5>
                <hr>
                <p class="card-text">{{ $company->companyAddress}}</p>
            </div>
        @endforeach
    </div>
</div>
{{-- image company end --}}
<!-- [ sample-page ] start -->
<div class="col-md-6 col-xl-8">
    <div class="card">
        <div class="card-header">
            <h5>Profil preusahaan</h5>
            <div class="card-header-right">
                <div class="btn-group card-option">
                    <a  href="/company/{{ $company->id}}/edit" class="btn dropdown-toggle btn-icon">
                        <i class="feather icon-edit-2"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @foreach ($companies as $company)
                <div class="form-group row">
                    <label for="companyName" class="col-sm-3 col-form-label">Nama Preusahaan</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="companyName" value="{{ $company->companyName}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="companyaddress" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="companyaddress" value="{{ $company->companyAddress}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="companyWebsite" class="col-sm-3 col-form-label">Website</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="companyWebsite" value="{{ $company->companyWebsite}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="companyEmail" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="companyEmail" value="{{ $company->companyEmail}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="companyPhone" class="col-sm-3 col-form-label">Telp</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="companyPhone" value="{{ $company->companyPhone}}">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- [ sample-page ] end -->