const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' )

module.exports = {
  mode: 'development',
  watch: true,
  entry: {
    app: [
    "./assets/scss/app.scss", 
    "./assets/js/app.js"
    ]
  },
  plugins: [
    new MiniCssExtractPlugin( {
      filename: "[name].css"
    } ),
  ],
  module: {
    rules:[
      {
        test: /\.scss$/,
        use: [MiniCssExtractPlugin.loader, "css-loader", "sass-loader"]
      }
    ]
  }
}