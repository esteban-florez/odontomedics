import { createApp, ref, onMounted, computed, watch } from 'vue/dist/vue.esm-browser.prod.js'

function setup() {
  const products = ref(new Map())
  const items = ref(new Map())
  const productId = ref('')
  const amount = ref('')
  const treatment = ref('')
  const disabled = computed(() => Boolean(!productId.value || !amount.value))
  const newTreatment = computed(() => treatment.value === 'new')
  
  const available = computed(() => {
    return Array.from(products.value.values())
      .filter(product => !items.value.has(product.id))
  })

  function remove(id) {
    items.value.delete(id)
  }
  
  watch(newTreatment, () => console.log(newTreatment.value))

  function add() {
    items.value.set(productId.value, {
      ...products.value.get(productId.value),
      amount: amount.value,
    })

    productId.value = ''
    amount.value = ''
  }

  onMounted(async () => {
    const response = await fetch('/api/products')
    const data = await response.json()

    data.forEach(product => {
      products.value.set(product.id, product)
    })
  })

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
  }
}

/** @type {import('vue').Component} */
const app = { setup }
createApp(app).mount('#products')
