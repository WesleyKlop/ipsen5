import React from 'react'
import ProgressBar from '../components/ProgressBar'
import Spinner from '../components/Spinner'
import Spacer from '../components/Spacer'
import Card from "../components/card/Card";
import CardHeader from "../components/card/CardHeader";
import CardBody from "../components/card/CardBody";
import CardButtons from "../components/card/CardButtons";
import Button from "../components/Button";
import {FaCheck, FaTimes} from "react-icons/fa";

const PropositionPage = () => (
    <>
        <Spacer/>
        {/*<div style={{ width: '100%', flex: '1', display: 'flex', alignItems: 'center', justifyContent: 'center' }}>*/}
        {/*    <Spinner/>*/}
        {/*</div>*/}
        <Card>
            <CardHeader>
                Beantwoord de stelling
            </CardHeader>
            <CardBody>
                <h2>Europa</h2>
                <p>Stelling hier.</p>
                <CardButtons>
                    <Button success><FaCheck/> Eens</Button>
                    <Button><FaTimes/> Oneend</Button>
                </CardButtons>
            </CardBody>
        </Card>
        <Spacer size={2}/>
        <ProgressBar/>
    </>
)

export default PropositionPage
