$(->
  $('input.quantity').val(1)
  $('button.decrease').click(->
    input = $(this).parent().siblings('input.quantity')
    currentQuantity = input.val()
    newQuantity = parseInt(currentQuantity) - 1
    if (newQuantity < 1)
      newQuantity = 1
    input.val(newQuantity)
  )

  $('button.increase').click(->
    input = $(this).parent().siblings('input.quantity')
    currentQuantity = input.val()
    newQuantity = parseInt(currentQuantity) + 1
    input.val(newQuantity)
  )
)