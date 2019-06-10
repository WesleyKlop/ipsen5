import React from 'react'
import Spacer from '../components/Spacer'
import CardHeader from '../components/card/CardHeader'
import CardBody from '../components/card/CardBody'
import CardButtons from '../components/card/CardButtons'
import LinkButton from '../components/LinkButton'
import Card from '../components/card/Card'

const FeedbackPage = () => (
  <>
    <Spacer/>
    <Card>
      <CardHeader>
        Klaar!
      </CardHeader>
      <CardBody>
        <p>U bent klaar met de peiling! Geef de peiling en beoordeling om uw resultaat te zien.</p>
        <CardButtons>
          <LinkButton block to={'/results'}>Resultaten bekijken</LinkButton>
        </CardButtons>
      </CardBody>
    </Card>
    <Spacer size={2}/>
  </>
)

export default FeedbackPage
