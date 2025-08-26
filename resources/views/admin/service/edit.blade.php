@extends(themeView('admin', 'layout.edit'), ['tab' => true, 'item' => $service])
@section('form')

    <div class="row">
        <div class="col-lg">
            {{ html()->file('image')->attribute('data-allowed-file-extensions', 'png jpg jpeg gif')->attribute('data-default-file', $service->getFirstMediaUrl())->accept('.png, .jpg, .jpeg, .gif')->class('dropify-image') }}
            {{ html()->file('documents[]')->multiple()->attribute('data-allowed-file-extensions', 'pdf doc docx xls xlsx ppt pptx')->accept('.pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx')->class('dropify-document') }}
        </div>
        <div class="col-lg-5">
            @if($service->getMedia('documents')->count() > 0)
                <div class="mb-3">
                    @foreach($service->getMedia('documents') as $doc)
                        <div class="d-flex align-items-center border rounded p-2 mb-2">
                            <span class="me-2">
                                <i data-feather="file"></i>
                            </span>
                            <span class="flex-grow-1">
                                <a onclick="return!window.open(this.href)" href="{{ $doc->getUrl() }}">{{ $doc->file_name }}</a>
                            </span>
                            <button type="button" class="btn btn-danger btn-sm"><i class="text-sm" data-feather="x"></i></button>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    @foreach (LanguageList() as $lang)
        <div id="{{ $lang->code }}" class="tab-pane @if ($loop->first) active show @endif">
            {{ html()->label(__("admin/{$folder}.form_title")) }}
            {{ html()->text("title[$lang->code]", $service->titles[$lang->code])->placeholder(__("admin/{$folder}.form_title_placeholder"))->class('form-control') }}
            {{ html()->label(__("admin/{$folder}.form_description")) }}
            {{ html()->textarea("description[$lang->code]", $service->descriptions[$lang->code])->class('editor') }}
        </div>
    @endforeach
    <div class="row">
        <div class="col-lg-4">
            {{ html()->label(__("admin/{$folder}.form_category")) }}
            {{ html()->select('category_id', $categories, $service->category_id)->placeholder(__('admin/general.select'))->class('form-control') }}
        </div>
        <div class="col-lg-4">
            {{ html()->label(__('admin/general.order')) }}
            {{ html()->number('order', $service->order)->placeholder(__('admin/general.order_placeholder'))->class('form-control') }}
        </div>
        <div class="col-lg-4">
            {{ html()->label(__('admin/general.status')) }}
            {{ html()->select('status', statusList(), $service->status ?? 'default')->class('form-control') }}
        </div>
    </div>
@endsection