import React, { useState } from 'react'
import Spacer from '../components/Spacer'
import CardHeader from '../components/card/CardHeader'
import CardBody from '../components/card/CardBody'
import CardButtons from '../components/card/CardButtons'
import Card from '../components/card/Card'
import FeedbackSlider from '../components/FeedbackSlider'
import ApiClient from '../ApiClient'
import Button from '../components/Button'

const FeedbackPage = ({ history }) => {
  const [value, setValue] = useState(0)
  const handleClick = async () => {
    await ApiClient.request('feedback', 'POST', { value })
    history.push('/results')
  }
  return (
    <>
      <Spacer />
      <Card>
        <CardHeader>Klaar!</CardHeader>
        <CardBody>
          <p>
            Je bent nu klaar met de Stem!App. Geef de peiling een beoordeling
            als je de resultaat wilt zien.
          </p>
          <FeedbackSlider value={value} onChange={setValue} />
          <CardButtons>
            <Button block onClick={handleClick}>
              Resultaten bekijken
            </Button>
          </CardButtons>
        </CardBody>
      </Card>
      <Spacer size={2} />
    </>
  )
}

export default FeedbackPage
