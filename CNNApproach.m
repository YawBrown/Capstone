Data=imread("20220104_110231_75_105e_3B_AnalyticMS_SR_clip.tif");
redChannel=Data(:,:,1);
greenChannel=Data(:,:,2);
blueChannel=Data(:,:,3);
NIR1=Data(:,:,4);
NIR2=Data(:,:,4);
NIR3=Data(:,:,4);
FinalData=cat(3,redChannel,greenChannel,blueChannel,NIR1,NIR2,NIR3);

dataDir = fullfile(tempdir,"rit18_data");
trainedUnet_url = "https://www.mathworks.com/supportfiles/vision/data/multispectralUnet.mat";
downloadTrainedNetwork(trainedUnet_url,dataDir);
load(fullfile(dataDir,"multispectralUnet.mat"));

patchSize=[1024,1024];
[height, width, nChannel] = size(FinalData);
patch = zeros([patchSize, nChannel-1], 'like', FinalData);

padSize(1) = patchSize(1) - mod(height, patchSize(1));
padSize(2) = patchSize(2) - mod(width, patchSize(2));

im_pad = padarray (FinalData, padSize, 0, 'post');
[height_pad, width_pad, nChannel_pad] = size(im_pad);

out = zeros([size(im_pad,1), size(im_pad,2)], 'uint8');

for i = 1:patchSize(1):height_pad
    
    for j =1:patchSize(2):width_pad
        
        for p = 1:nChannel
               
            patch(:,:,p) = squeeze( im_pad( i:i+patchSize(1)-1,...
                                            j:j+patchSize(2)-1,...
                                            p));
            
        end
        
          patch_seg = semanticseg(patch, net, 'outputtype', 'uint8');
          whos patch
        
          out(i:i+patchSize(1)-1, j:j+patchSize(2)-1) = patch_seg;
       
    end
end


out = out(1:height, 1:width);

figure
imshow(out,[])
title("Segmented Image")

segmentedImage = medfilt2(out,[7,7]);
imshow(segmentedImage,[]);
title("Segmented Image with Noise Removed")

classNames = [ "RoadMarkings","Tree","Building","Vehicle","Person", ...
               "LifeguardChair","PicnicTable","BlackWoodPanel",...
               "WhiteWoodPanel","OrangeLandingPad","Buoy","Rocks",...
               "LowLevelVegetation","Grass_Lawn","Sand_Beach",...
               "Water_Lake","Water_Pond","Asphalt"]; 

cmap = jet(numel(classNames));
B = labeloverlay(histeq(FinalData(:,:,[3 2 1])),segmentedImage,Transparency=0.8,Colormap=cmap);

N = numel(classNames);
ticks = 1/(N*2):1/N:1;

figure
imshow(B)
title("Labeled Segmented Image")
colorbar(TickLabels=cellstr(classNames),Ticks=ticks,TickLength=0,TickLabelInterpreter="none");
colormap(cmap)

WaterClassIds = uint8([16,17]);
WaterPixels = ismember(segmentedImage(:),WaterClassIds);
validPixels = (segmentedImage~=0);

numWaterPixels = sum(WaterPixels(:));
numValidPixels = sum(validPixels(:));

percentWaterCover = (numWaterPixels/numValidPixels)*100;
fprintf("The percentage of water cover is %3.5f%%.",percentWaterCover);