import { createApp, ref, onMounted, computed } from 'vue/dist/vue.esm-browser.prod.js'
const fixNum = (num) => Number(num.toFixed(2))

function setup() {
  const products = ref(new Map())
  const items = ref(new Map())
  const treatments = ref(new Map())
  const productId = ref('')
  const treatmentId = ref('')
  const amount = ref('')
  const procedureId = ref('')

  const product = computed(() => products.value.get(productId.value))
  const treatment = computed(() => treatments.value.get(treatmentId.value))
  const max = computed(() => product.value?.stock ?? 0)
  const error = computed(amountError)
  const disabled = computed(() => !productId.value || !amount.value || error.value)
  const newProcedure = computed(() => procedureId.value === 'new')
  const available = computed(availableProducts)
  const itemsArray = computed(() => Array.from(items.value.values()))
  const treatmentPrice = computed(() => treatment.value.price)
  const itemsPrice = computed(itemsSum)
  const totalPrice = computed(() => treatmentPrice.value + itemsPrice.value)
  const itemsJson = computed(itemsToJson)
  const existing = computed(() => !newProcedure.value && procedureId.value !== '')

  onMounted(async () => {
    const [productsResponse, treatmentsResponse] = await Promise.all([
      fetch('/api/products'),
      fetch('/api/treatments')
    ])

    const [productsData, treatmentsData] = await Promise.all([
      productsResponse.json(),
      treatmentsResponse.json()
    ])

    fillMapRef(products, productsData)
    fillMapRef(treatments, treatmentsData)

    function fillMapRef(map, models) {
      models.forEach(model => {
        map.value.set(model.id, model)
      })
    }

    const field = document.querySelector('#procedure_id')
    procedureId.value = field.value
  })

  function itemsSum() {
    const sum = itemsArray.value
      .reduce((sum, item) => sum + item.total, 0)

    return fixNum(sum)
  }

  function itemsToJson() {
    const itemsData = itemsArray.value.map(i => ({ id: i.id, amount: i.amount }))
    return JSON.stringify(itemsData)
  }

  function availableProducts() {
    return Array.from(products.value.values())
      .filter(product => !items.value.has(product.id))
  }

  function amountError() {
    if (!productId.value || amount.value === '') return false
    const _amount = Number(amount.value)
    return _amount > max.value || _amount <= 0 || String(_amount).includes('.')
  }

  function remove(id) {
    items.value.delete(id)
  }

  function add() {
    items.value.set(productId.value, {
      ...product.value,
      amount: amount.value,
      total: fixNum(amount.value * product.value.price),
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
    newProcedure,
    max,
    error,
    treatmentId,
    procedureId,
    treatment,
    itemsJson,
    treatmentPrice,
    itemsPrice,
    totalPrice,
    existing,
  }
}

createApp({ setup }).mount('#products')
