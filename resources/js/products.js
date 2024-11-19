import { createApp, ref, onMounted, computed } from 'vue/dist/vue.esm-browser.prod.js'

function setup() {
  const products = ref(new Map())
  const items = ref(new Map())
  const productId = ref('')
  const amount = ref('')
  const treatment = ref('new')

  const selected = computed(() => products.value.get(productId.value))
  const max = computed(() => selected.value?.stock ?? 0)
  const error = computed(amountError)
  const disabled = computed(() => !productId.value || !amount.value || error.value)
  const newTreatment = computed(() => treatment.value === 'new')
  const available = computed(availableProducts)

  onMounted(async () => {
    const response = await fetch('/api/products')
    const data = await response.json()
  
    data.forEach(product => {
      products.value.set(product.id, product)
    })
  })

  function availableProducts() {
    return Array.from(products.value.values())
      .filter(product => !items.value.has(product.id))
  }

  function amountError() {
    console.log(amount.value)
    if (!productId.value || amount.value === '') return false
    const value = Number(amount.value)
    return value > max.value || value <= 0
  }

  function remove(id) {
    items.value.delete(id)
  }

  function add() {
    items.value.set(productId.value, {
      ...selected.value,
      amount: amount.value,
    })

    productId.value = ''
    amount.value = ''
  }

  return {
    products,
    items,
    available,
    remove,
    add,
    productId,
    amount,
    disabled,
    treatment,
    newTreatment,
    max,
    error,
  }
}

createApp({ setup }).mount('#products')
