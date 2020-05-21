import torch
from torch import nn
from torchvision import models
import numpy as np
import matplotlib.pyplot as plt
from PIL import Image
import sys

def load_checkpoint(filepath):
    '''
    input: filepath of the saved model
    return: a model loaded from the path
    
    checks if the model saved is a densenet 121 model and defining our own classifier
    
    '''
    checkpoint = torch.load(filepath)
    
    if checkpoint['arch'] == 'densenet121':
        
        model = models.densenet121(pretrained=True)
        
        for param in model.parameters():
            param.requires_grad = False
    else:
        print("Architecture not recognized.")
    
    model.class_to_idx = checkpoint['class_to_idx']
    
    model.classifier = nn.Sequential(nn.Linear(1024, 512),
                                 nn.ReLU(),
                                 nn.Linear(512, 9),
                                 nn.LogSoftmax(dim=1))
    
    model.load_state_dict(checkpoint['model_state_dict'])
    
    return model


model = load_checkpoint('checkpoint.pth')
#loading the model from the memory


def process_image(image_path):
    ''' input: path of the image to be processed
        Scales, crops, and normalizes a PIL image for a PyTorch model,
        returns an Numpy array
    '''
    
    # Process a PIL image for use in a PyTorch model
    pil_image = Image.open(image_path)
    
    # Resize
    if pil_image.size[0] > pil_image.size[1]:
        pil_image.thumbnail((5000, 256))
    else:
        pil_image.thumbnail((256, 5000))
        
    # Crop 
    left_margin = (pil_image.width-224)/2
    bottom_margin = (pil_image.height-224)/2
    right_margin = left_margin + 224
    top_margin = bottom_margin + 224
    
    pil_image = pil_image.crop((left_margin, bottom_margin, right_margin, top_margin))
    
    # Normalize
    np_image = np.array(pil_image)/255
    mean = np.array([0.485, 0.456, 0.406])
    std = np.array([0.229, 0.224, 0.225])
    np_image = (np_image - mean) / std
    
    # PyTorch expects the color channel to be the first dimension but it's the third dimension in the PIL image and Numpy array
    # Color channel needs to be first; retain the order of the other two dimensions.
    np_image = np_image.transpose((2, 0, 1))
    
    return np_image

def imshow(image, ax=None, title=None):
    '''
        input: a numpy array of the image created by the process_image fn
        
    
    '''
    
    if ax is None:
        fig, ax = plt.subplots()
    
    # PyTorch tensors assume the color channel is the first dimension
    # but matplotlib assumes is the third dimension
    image = image.transpose((1, 2, 0))
    
    # Undo preprocessing (remove the normalization)
    mean = np.array([0.485, 0.456, 0.406])
    std = np.array([0.229, 0.224, 0.225])
    image = std * image + mean
    
    if title is not None:
        ax.set_title(title)
    
    # Image needs to be clipped between 0 and 1 or it looks like noise when displayed
    image = np.clip(image, 0, 1)
    
    ax.imshow(image)
    
    return ax


def predict(image_path, model, print_image=0, topk=5):
    ''' 
        input: image path of image, model to be used, boolean print_image to print the image
        and no of top probabilities
    
        Predict the class (or classes) of an image using a trained deep learning model.
        
        prints top probabilities and indices
    '''
    model.eval()
    if(torch.cuda.is_available()):
        model.to('cuda')
    
    image = process_image(image_path)
    
    if(print_image):
        imshow(image) 
        
    # Convert image to PyTorch tensor first
    if(torch.cuda.is_available()):
        image = torch.from_numpy(image).type(torch.cuda.FloatTensor)
    else:
        image = torch.from_numpy(image).type(torch.FloatTensor)

    # Returns a new tensor with a dimension of size one inserted at the specified position.
    image = image.unsqueeze(0)
    with torch.no_grad():
        output = model.forward(image)
    
    probabilities = torch.exp(output)
    
    # Probabilities and the indices of those probabilities corresponding to the classes
    top_probabilities, top_indices = probabilities.topk(topk)
    #print(top_probabilities)
    #print(top_indices)
    # Convert to lists
    top_probabilities = top_probabilities.detach().type(torch.FloatTensor).numpy().tolist()[0] 
    top_indices = top_indices.detach().type(torch.FloatTensor).numpy().tolist()[0] 
    for i in top_indices:
        print(i,end=" ")
    for i in top_probabilities:
        print('{:.4f}'.format(i*100),end=" ")
    #print(top_probabilities)
    #print(top_indices)

imageFile=sys.argv[1]   

#predict('9.jpg', model)

predict(imageFile, model)