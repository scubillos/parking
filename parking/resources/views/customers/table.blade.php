
<table id="data_table" class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th style="width: 100px">Email</th>
            <th style="width: 120px">Address</th>
            <th>Company</th>
            <th>Phone</th>
            <th>Created At</th>
            <th class="nosort">Operation</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customers as $key => $customer)
        <tr>
            <td>{{ $customer->id  }}</td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->address }}</td>
            <td>{{ $customer->company }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->created_at->format('Y/m/d') }}</td>
            <td>
                <div class="table-actions d-flex">
                    <a href="{{ route('customers.edit', $customer->id) }}"><i class="ik ik-edit-2"></i></a>
                    <a href="#" data-toggle="modal" data-target="#delete{{ $key }}"><i class="ik ik-trash-2"></i></a>

                </div>
            </td>
            <td></td>
        </tr>
        @include('customers.delete')
        @endforeach
    </tbody>
</table>
