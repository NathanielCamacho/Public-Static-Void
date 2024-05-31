$(document).ready(function(){
    $.ajax({
        url: 'get_stats.php',
        type: 'GET',
        dataType: 'json',
        success: function(data){
            if (data.error) {
                console.error(data.error);
                return;
            }

            $('#stats').html(`
                <p>Amount Sold Per Product:</p>
                <ul>
                    ${data.amount_sold_per_product.map(item => `<li>${item.product}: ${item.amount_sold}</li>`).join('')}
                </ul>
                <p>Best Seller: ${data.best_seller}</p>
                <p>Income this Month: $${data.income_this_month}</p>
                <p>Income Comparison to Previous Month: ${data.income_comparison}</p>
            `);
        },
        error: function(xhr, status, error){
            console.error(error);
        }
    });
});
