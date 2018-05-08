<div class="direct-x">
    <table class="table table-bordered table-hover table-striped text-center">
        <thead>
            <tr>
                <th>هزینه رزرو سالن</th>
                <th>هزینه پذیرایی</th>
                <th>هزینه خدمات سمعی بصری</th>
                <th>هزینه خدمات گرافیکی</th>
                <th>هزینه خدمات روابط عمومی</th>
                <th>مجموع</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td id="pricing-room"> {{old('schedule')['cost'] ? number_format(old('schedule')['cost']) : 0}} </td>
                <td id="pricing-catering"> {{ isset(old('catering')['cost']) ? number_format(array_sum(old('catering')['cost'])) : 0}} </td>
                <td id="pricing-medium"> {{ isset(old('medium')['cost']) ? number_format(array_sum(old('medium')['cost'])) : 0}} </td>
                <td id="pricing-graphic"> {{ isset(old('graphic')['cost']) ? number_format(array_sum(old('graphic')['cost'])) : 0}} </td>
                <td id="pricing-informing"> {{ isset(old('informing')['cost']) ? number_format(array_sum(old('informing')['cost'])) : 0}} </td>
                <td id="pricing-total"> {{old('total_cost') ? number_format(old('total_cost')) : 0}} </td>
            </tr>
        </tbody>
    </table>
</div>
