import React, { Component, createRef } from 'react'

class FeedbackSlider extends Component {
  static defaultProps = {
    min: 0,
    max: 100,
    value: 0,
    onChange: null,
  }

  canvas = createRef()
  state = {
    isActive: false,
  }

  setActive = () => this.setState({ isActive: true })
  setInactive = () => this.setState({ isActive: false })

  handleMouseMove = e => {
    if (this.state.isActive === false) {
      return
    }
    // FIXME: convert mouse coordinates to value
    this.props.onChange && this.props.onChange(100)
  }

  componentDidMount() {
    this.draw()
  }

  componentDidUpdate(prevProps) {
    if (this.props.value !== prevProps.value) {
      this.draw()
    }
  }

  render() {
    return (
      <canvas
        ref={this.canvas}
        onMouseDown={this.setActive}
        onMouseUp={this.setInactive}
        onMouseLeave={this.setInactive}
        onMouseMove={this.handleMouseMove}
        width={300}
        height={150}
      />
    )
  }

  draw = () => {
    const cvs = this.canvas.current
    const ctx = cvs.getContext('2d')
    ctx.clearRect(0, 0, 300, 150)
    this.drawBar(ctx)
    this.drawThumb(ctx)
  }

  drawBar = ctx => {
    const grd = ctx.createLinearGradient(0, 0, 300, 0)
    grd.addColorStop(0, '#ff42ab')
    grd.addColorStop(1, '#c7da31')

    ctx.lineWidth = 7
    ctx.strokeStyle = grd
    ctx.beginPath()
    ctx.arc(150, 150, 100, Math.PI, 0)
    ctx.stroke()
    ctx.closePath()
  }

  drawThumb = ctx => {
    const { value, min, max } = this.props
    const percentage = (value / (max - min)) * 100
    // FIXME Find some way to convert that percentage to coordinates

    ctx.fillStyle = '#522871'
    ctx.beginPath()
    ctx.arc(50, 140, 10, 0, 2 * Math.PI)
    ctx.fill()
    ctx.closePath()
  }
}

export default FeedbackSlider
