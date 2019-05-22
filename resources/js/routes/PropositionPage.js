import React from 'react'
import ProgressBar from '../components/ProgressBar'
import Spinner from '../components/Spinner'
import Spacer from '../components/Spacer'

const PropositionPage = () => (
    <>
        <Spacer/>
        <div style={{ width: '100%', flex: '1', display: 'flex', alignItems: 'center', justifyContent: 'center' }}>
            <Spinner/>
        </div>
        <Spacer size={2}/>
        <ProgressBar/>
    </>
)

export default PropositionPage
