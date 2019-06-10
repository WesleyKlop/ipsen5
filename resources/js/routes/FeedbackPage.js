import React, { useState } from 'react'
import Spacer from '../components/Spacer'
import CardHeader from '../components/card/CardHeader'
import CardBody from '../components/card/CardBody'
import CardButtons from '../components/card/CardButtons'
import LinkButton from '../components/LinkButton'
import Card from '../components/card/Card'
import FeedbackSlider from '../components/FeedbackSlider'

const FeedbackPage = () => {
  const [value, setValue] = useState(50)
  return (
    <>
      <Spacer />
      <Card>
        <CardHeader>Klaar!</CardHeader>
        <CardBody>
          <p>
            U bent klaar met de peiling! Geef de peiling en beoordeling om uw
            resultaat te zien.
          </p>
          <FeedbackSlider value={value} onChange={setValue} />
          <CardButtons>
            <LinkButton block to={'/results'}>
              Resultaten bekijken
            </LinkButton>
          </CardButtons>
        </CardBody>
      </Card>
      <Spacer size={2} />
    </>
  )
}

export default FeedbackPage
