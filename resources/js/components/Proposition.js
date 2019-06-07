import React from 'react'
import CardHeader from './card/CardHeader'
import CardBody from './card/CardBody'
import Spacer from './Spacer'
import CardButtons from './card/CardButtons'
import Button from './Button'
import Card from './card/Card'
import { FaCheck, FaTimes } from 'react-icons/fa'

const Proposition = ({ survey, proposition, onChoose, ...props }) => (
  <Card>
    <CardHeader {...props}>Beantwoord de stelling</CardHeader>
    <CardBody flex height={300}>
      <h2>{survey}</h2>
      <p>{proposition}</p>
      <Spacer />
      <CardButtons>
        <Button success onClick={onChoose} value={true}>
          <FaCheck /> Eens
        </Button>
        <Button onClick={onChoose} value={false}>
          <FaTimes /> Oneens
        </Button>
      </CardButtons>
    </CardBody>
  </Card>
)

export default Proposition
