import React from 'react'
import CardBody from '../components/card/CardBody'
import CardFooter from '../components/card/CardFooter'
import { FaCheck, FaTimes } from 'react-icons/fa'
import Card from './card/Card'

const ResultCard = ({ proposition, answer }) => {
  return (
    <>
      <Card>
        <CardBody>{proposition}</CardBody>
        <CardFooter className={answer ? 'agree' : 'disagree'}>
          <p>
            {answer ? (
              <>
                <FaCheck /> eens
              </>
            ) : (
              <>
                <FaTimes /> oneens
              </>
            )}
          </p>
        </CardFooter>
      </Card>
      <br />
    </>
  )
}

export default ResultCard
