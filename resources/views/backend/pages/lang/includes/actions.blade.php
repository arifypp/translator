<x-utils.form-button
    method="patch"
    button-class="btn btn-info btn-sm"
    icon="fas fa-search"
    name="view-lang"
>
    @lang('View')
</x-utils.form-button>

<x-utils.form-button

    method="patch"
    button-class="btn btn-primary btn-sm"
    icon="fas fa-pen"
    name="lang-edit"
    permission="admin.access.user.reactivate"
>
    @lang('Edit')
</x-utils.form-button>


<x-utils.form-button

    method="patch"
    button-class="btn btn-danger btn-sm"
    icon="fas fa-trash"
    name="lang-edit"
    permission="admin.access.user.reactivate"
>
    @lang('Delete')
</x-utils.form-button>