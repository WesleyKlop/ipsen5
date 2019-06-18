export const angleDifference = (angle1, angle2) => {
  const diff = ((angle2 - angle1 + Math.PI) % (Math.PI * 2)) - Math.PI
  return diff < -Math.PI ? diff + Math.PI * 2 : diff
}

export const angleDifference2Percentage = difference => {
  return (difference / Math.PI) * 100 + 50
}

export const calculatePercentage = (angle1, angle2) =>
  Math.round(angleDifference2Percentage(angleDifference(angle1, angle2)))

export const getRelativePosition = (container, clientX, clientY) => {
  const { top, left, width } = container.getBoundingClientRect()
  return [clientX - left, clientY - top, width]
}

export const getClientCoordinates = e => {
  if (typeof e.touches !== 'undefined') {
    return e.touches[0]
  }
  return e
}
